<?php
namespace Test\Controllers;

use Test\Models\Users;

/**
 * Class ApiController
 * Peoples list in view
 */
class CmsController extends ControllerBase
{
    
    public function initialize()
    {   
        $this->view->setTemplateBefore('public');
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
    }
    /**
     * Index action for peoples data
     *
     * @return void
     */
    public function indexAction()
    {
         $users = Users::find();
         $this->view->users = $users;
    }

}

