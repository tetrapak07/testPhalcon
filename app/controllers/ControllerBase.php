<?php
namespace Test\Controllers;

use Phalcon\Mvc\Controller;
use Test\Models\EmailConfirmations;

class ControllerBase extends Controller
{
    public function sendEmail($user)
    {
       $emailConfirmation = new EmailConfirmations();

                $emailConfirmation->usersId = $user->id;

                if ($emailConfirmation->save()) {
                    $this->getDI()
                        ->getFlash()
                        ->notice('A confirmation mail has been sent to ' . $user->email);
                }  
    }
    
    /**
     * Send data to json
     *
     * @return JsonResponse
     */
    protected function sendJson($data) 
    {
        $this->view->disable();
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setContent(json_encode($data));
        return $this->response;
    }
}
