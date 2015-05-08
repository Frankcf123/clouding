<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $test="this is a test";
        $this->view->page_name="DashBoard";
    }

    public function registerAction()
    {
        // action body
        $request = $this->getRequest();
        if ($request->isPost()) {
            //analyse the data here 
//                        $regardKeys = $request->getParam('regarding_key');
            $email=$request->getParam('email');
            $password=$request->getParam("password");
            echo $email."\n".$password;
        }
                $this->view->page_name="Register";

    }

    public function loginAction()
    {
        // action body
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('index/index');
        }
       
        $request=$this->getRequest();
        $form=new Application_Form_Login();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $authAdapter=$this->getAuthAdapter();
                $username=$form->getValue('username');
                $password=$form->getValue('password');
                $authAdapter->setIdentity($username)->setCredential($password);
                $auth=Zend_Auth::getInstance();
                $result=$auth->authenticate($authAdapter);
                if($result->isValid()){
                    $identity=$authAdapter->getResultRowobject();
                    $authStorage=$auth->getStorage();
                    $authStorage->write($identity);
                    echo "valid";
                }
                else{
                    echo "invalid";
                }
            }
        }
       $this->view->page_name="Login";
       $this->view->login_error="login success";
    }

    public function logoutAction()
    {
        // action body
    }

    
    private function getAuthAdapter()
    {
        $authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('user')->setIdentityColumn("username")->setCredentialColumn("password");
        return $authAdapter;
    }

    

}


