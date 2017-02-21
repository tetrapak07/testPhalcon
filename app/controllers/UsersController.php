<?php
namespace Test\Controllers;

use Phalcon\Tag;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Test\Forms\ChangePasswordForm;
use Test\Forms\UsersForm;
use Test\Models\Users;
use Test\Models\Groups;
use Test\Models\UsersGroups;
use Test\Models\PasswordChanges;

/**
 * Test\Controllers\UsersController
 * CRUD to manage users
 */
class UsersController extends ControllerBase
{

    public function initialize()
    {   
        if (!$this->session->has('auth-identity')) {
           $this->response->redirect('session/login');
        }
       
        $this->view->setTemplateBefore('private');
       
    }

    /**
     * Default action, shows the search form
     */
    public function indexAction()
    {
        $this->persistent->conditions = null;
        
        if ($this->request->getQuery('search')) {
           $this->view->form = new UsersForm();
           return true;
        } 

        $this->dispatcher->forward([
              'action' => 'search'
            ]);

    }


    /**
     * Searches for users
     */
    public function searchAction()
    {
        $numberPage = 1;
        $parameters = [];
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Test\Models\Users', $this->request->getPost());
            $parameters = $query->getParams();
            if (count($parameters) == 0) {
              $this->flash->error("The search params not set");
            }
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        
        $users = Users::find($parameters);
        if (count($users) == 0) {
            $this->flash->notice("The search did not find any users");
            
        }

        $paginator = new Paginator([
            "data" => $users,
            "limit" => 5,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();

    }

    /**
     * Creates a User
     */
    public function createAction()
    {
        $form = new UsersForm(null);

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) == false) {
                
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                
            } else {

                $user = new Users([
                    'name' => $this->request->getPost('name', 'striptags'),
                    
                    'email' => $this->request->getPost('email', 'email'),
                    
                    'active' => $this->request->getPost('active')
                ]);
                
                $groups = $this->request->getPost('groups');
                     
                $user->usersGroups = $this->prerapreGroups($groups, $user);

                if (!$user->save()) {
                    $this->flash->error($user->getMessages());
                } else {
                   
                    $this->flash->success("User was created successfully");

                    Tag::resetInput();
                }
            }
        }
        
        $groupsAll = Groups::find();

        $this->view->groupsAll = $groupsAll;

        $this->view->form = $form;
    }

    /**
     * Saves the user from the 'edit' action
     */
    public function editAction($id)
    {
        $user = Users::findFirstById($id);

        if (!$user) {
            $this->flash->error("User was not found");
            return $this->dispatcher->forward([
                        'action' => 'index'
            ]);
        }
        

        if ($this->request->isPost()) {

            $user->assign([
                'name' => $this->request->getPost('name', 'striptags'),

                'email' => $this->request->getPost('email', 'email'),

                'active' => $this->request->getPost('active')
            ]);
            
            //print_r($this->request->getPost('groups'));

            $form = new UsersForm($user, [
                'edit' => true
            ]);

             $user->getUsersGroups()->delete(); 

            $groups = $this->request->getPost('groups');
                     
            $user->usersGroups = $this->prerapreGroups($groups, $user);

            if ($form->isValid($this->request->getPost()) == false) {
                
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                
            } else {

                if (!$user->save()) {
                    $this->flash->error($user->getMessages());
                } else {
                    #$this->sendEmail($user);
                   
                    $this->flash->success("User was updated successfully");

                    Tag::resetInput();
                }
            }
        }
        
        $userGroups = $user->groups->toArray();

        $ids =[];
        foreach ($userGroups as $value) {
            array_push($ids, $value['id']);
        }

        $groupsAll = Groups::find();

        $this->view->user = $user;
        $this->view->groupsAll = $groupsAll;
        $this->view->ids = $ids;

        $this->view->form = new UsersForm($user, [
            'edit' => true
        ]);
    }

    /**
     * Deletes a User
     *
     * @param int $id
     */
    public function deleteAction($id)
    {
        $user = Users::findFirstById($id);
        if (!$user) {
            $this->flash->error("User was not found");
            return $this->dispatcher->forward([
                'action' => 'index'
            ]);
        }

        if (!$user->delete()) {
            $this->flash->error($user->getMessages());
        } else {
            $this->flash->success("User was deleted");
        }

        return $this->dispatcher->forward([
            'action' => 'index'
        ]);
    }

    /**
     * Users must use this action to change its password
     */
    public function changePasswordAction()
    {
        $form = new ChangePasswordForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {

                $user = $this->auth->getUser();

                $user->password = $this->security->hash($this->request->getPost('password'));
                $user->mustChangePassword = 'N';

                $passwordChange = new PasswordChanges();
                $passwordChange->user = $user;
                $passwordChange->ipAddress = $this->request->getClientAddress();
                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {
                    $this->flash->error($passwordChange->getMessages());
                } else {

                    $this->flash->success('Your password was successfully changed');

                    Tag::resetInput();
                }
            }
        }

        $this->view->form = $form;
       
    }
    
    /**
     * Users must use this action to change its password
     */
    private function prerapreGroups($groups, $user) {
        
        $data = [];
        
         if (count($groups)>0) {
                             
            foreach ($groups as  $value) {

                $usersGroups = new UsersGroups();
                $usersGroups->userId = $user->id;
                $usersGroups->groupId = $value;
                $data[] = $usersGroups;

            }

        }
        
       return $data;                 
    }
}
