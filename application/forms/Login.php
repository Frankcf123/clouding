<?php

class Application_Form_Login extends Zend_Form
{

    public function _construct($option=null){
//        $this->setName('login');
//        $username=new Zend_Form_Element_Text('username');
//        $username->setLabel('User Name')->setRequired();
//        $password=new Zend_Form_Element_Password('password');
//        $password->setLabel('Password')->setRequired();
//        $login=new Zend_Form_Element_Submit("LOGIN");
//        $login->setLabel('Login');
//        $this->addElement(array($username,$password,$login));
//        $this->setMethod('post');
//        $this->setAction(
//        Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');
    }
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('login');
        $username=new Zend_Form_Element_Text('username');
        $username->setLabel('User Name')->setRequired();
        $password=new Zend_Form_Element_Password('password');
        $password->setLabel('Password')->setRequired();
        $login=new Zend_Form_Element_Submit(
                       "submit"
                );
        $login->setLabel( "<button type=\"submit\" class=\"btn btn-primary\">Sign in</button>");
        $this->addElements(array($username,$password,$login));
        $this->setMethod('post');
        $this->setAction(
        Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');
    }


}

