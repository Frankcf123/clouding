<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $this->_helper->layout->disableLayout();
        if (Zend_Auth::getInstance()->hasIdentity()) {
//            $this->_redirect('index/index');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $authAdapter = $this->getAuthAdapter();
            $username = (null != $this->getRequest()->getParam("username")) ? $this->getRequest()->getParam("username") : "wrong";
            $password = (null != $this->getRequest()->getParam("password")) ? $this->getRequest()->getParam("password") : "wrong";
            $authAdapter->setIdentity($username)->setCredential($password);
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($authAdapter);
            if ($result->isValid()) {
                $identity = $authAdapter->getResultRowobject();
                $authStorage = $auth->getStorage();
                $authStorage->write($identity);
                $this->view->login_error = "";
                $this->_redirect(root_url . '/user/index');
            } else {
                if ($username == "wrong" || $password == "wrong") {
                    $this->view->login_error = "You must fill all the fields";
                } else {
                    $this->view->login_error = "Wrong em1ail or password";
                }
            }
        }
        $this->view->page_name = "Welcome to Service Monket";
    }

    public function examCodeCheckAction() {
        // action body
    }

    public function headerAction() {
        // action body
    }

    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("password");
        return $authAdapter;
    }

}
