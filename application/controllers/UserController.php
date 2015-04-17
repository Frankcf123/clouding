<?php

class UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function registerAction() {
        // action body
        $request = $this->getRequest();
        if ($request->isPost()) {
            //analyse the data here 
//                        $regardKeys = $request->getParam('regarding_key');
            $email=$request->getParam('email');
            $password=$request->getParam("password");
            echo $email."\n".$password;
        }
    }

    public function loginAction() {
        // action body
        $request = $this->getRequest();
        if ($request->isPost()) {
            //analyse the data here 
                  $email=$request->getParam('email');
            $password=$request->getParam("password");
            echo $email."\n".$password;
        }
    }

}
