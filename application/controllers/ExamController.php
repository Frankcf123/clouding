<?php

class ExamController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->view->page_name="Exam Info";
    }

    public function addExamAction()
    {
        // action body
                $this->view->page_name="Exam Name";

    }

    public function addBasicInfoAction()
    {
        // action body
    }


}





