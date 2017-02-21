<?php

namespace Test\Controllers;

class IndexController extends ControllerBase
{
    public function initialize()
    {   
        $this->view->setTemplateBefore('public');
    } 
    
    /**
     * Set the public layout (layouts/public.volt)
     */
    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
       
    }
    
    public function show404Action()
    {
        
    }
    
    public function show503Action()
    {
        
    }

}

