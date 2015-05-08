<?php

class UserController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect(root_url . '/index/index');
        }

        $auth = Zend_Auth::getInstance()->getStorage()->read();
        $userInfo = Zend_Auth::getInstance()->getStorage()->read();
        $test = "this is a test";
        $this->view->page_name = "DashBoard";
        $this->view->username = $userInfo->username;
    }

    public function registerAction() {
        // action body
        $request = $this->getRequest();
        $this->view->register_error = "";

        if ($request->isPost()) {
            $authAdapter = $this->getAuthAdapter();
            $username = (null != $this->getRequest()->getParam("username")) ? $this->getRequest()->getParam("username") : "wrong";
            $password = (null != $this->getRequest()->getParam("password")) ? $this->getRequest()->getParam("password") : "wrong";
            $authAdapter->setIdentity($username)->setCredential($username);
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($authAdapter);
            $table = new Application_Model_User();
            //logiin authen
            if ($username == "wrong" && $password == "wrong") {
                $this->view->register_error = "You must fill out all the fields";
            } elseif ($result->isValid() || $username == "wrong") {
                $this->view->register_error = "The username may already be taken";
            } else {
                //process to register and write to database
                $table->insertdb(array(
                    "username" => $username,
                    "password" => $password
                ));
                $this->view->register_error = "";
                //write idenntity
//                $loginAdapter = $this->getLoginAuthAdapter();
//                $loginAdapter->setIdentity($username)->setCredential($password);
//                $auth2 = Zend_Auth::getInstance();
//                $identity = $loginAdapter->getResultRowobject();
//                $authStorage = $auth2->getStorage();
//                $authStorage->write($identity);

                $this->_redirect(root_url . '/user/regsuccess');
            }
        }
        $this->view->page_name = "Register";
    }

    public function logoutAction() {
        // action body
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect(root_url.'/index/index');
    }

    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("username");
        return $authAdapter;
    }

    private function getLoginAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("password");
        return $authAdapter;
    }

    public function regsuccessAction() {
        // action body
    }

}
