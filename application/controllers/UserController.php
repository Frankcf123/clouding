<?php

class UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $test = "this is a test";
        $this->view->page_name = "DashBoard";
    }

    public function registerAction() {
        // action body
        $request = $this->getRequest();
        $this->view->register_error = "";

        if ($request->isPost()) {
            $authAdapter = $this->getAuthAdapter();
            $username = (null != $this->getRequest()->getParam("username")) ? $this->getRequest()->getParam("username") : "wrong";
            $password = (null != $this->getRequest()->getParam("password")) ? $this->getRequest()->getParam("password") : "wrong";
            $authAdapter->setIdentity("frankcf329")->setCredential("frankcf329");
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($authAdapter);
            $table = new Application_Model_User();

            if ($username == "wrong" && $password == "wrong") {
                $this->view->register_error = "You must fill out all the fields";
            } 
//            elseif ($table->checkUnique($username) || $username == "wrong") {
//                $identity = $authAdapter->getResultRowobject();
//                $authStorage = $auth->getStorage();
//                $authStorage->write($identity);
//                $this->view->register_error = "The username may already be taken";
//            }
            else {
                //process to register and write to database
                $table->insertdb(array(
                    "username" => $username,
                    "password" => $password
                ));
                $this->view->register_error = "";
            }
        }
        $this->view->page_name = "Register";
    }

    public function logoutAction() {
        // action body
    }

    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("username");
        return $authAdapter;
    }

}
