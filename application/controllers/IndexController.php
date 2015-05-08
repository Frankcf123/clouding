<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $this->_helper->layout->disableLayout();
         if(Zend_Auth::getInstance()->hasIdentity()){
//            $this->_redirect('index/index');
        }
       
        $request=$this->getRequest();
        if($request->isPost()){
                $authAdapter=$this->getAuthAdapter();
                $username=$this->getRequest()->getParam("username");

                $password=$this->getRequest()->getParam("password");

                $authAdapter->setIdentity($username)->setCredential($password);
                $auth=Zend_Auth::getInstance();
                $result=$auth->authenticate($authAdapter);
                if($result->isValid()){
                    $identity=$authAdapter->getResultRowobject();
                    $authStorage=$auth->getStorage();
                    $authStorage->write($identity);
                   $this->view->login_error="";
                }
                else{
                   $this->view->login_error="Wrong email or password";
                }
        }
       $this->view->page_name="Welcome to Service Monket";
    }

    public function examCodeCheckAction() {
        // action body
    }

    public function headerAction() {
        // action body
    }

     private function getAuthAdapter()
    {
        $authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("password");
        return $authAdapter;
    }
}
