<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
                $this->render("header");
                $this->render("index");

    }

    public function examCodeCheckAction()
    {
        // action body
    }

      public function headerAction()
    {
        // action body
    }


}







