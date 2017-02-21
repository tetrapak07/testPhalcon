<?php

namespace Test\Controllers;

use Test\Models\Users;

/**
 * Class ApiController
 * Test json response 
 */
class ApiController extends ControllerBase
{
    
     /**
     * Index action for peoples data
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
       $users = Users::find(array(
            'columns' => 'id, name, email'
            ));
       return $this->sendJson($users);
    }

}

