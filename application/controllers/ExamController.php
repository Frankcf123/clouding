<?php

class ExamController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $this->view->page_name = "Exam Info";
    }

    public function addExamAction($name) {


        $request = $this->getRequest();
        if ($request->isPost()) {
            $exam_name = $request->getParam("exam_name");
            $exam_no = $request->getParam("exam_no");
            $exam_duration = $request->getParam("exam_duration");
            $this->view->exam_name = $exam_name;
            $this->view->exam_no = $exam_no;
            $this->view->exam_duration = $exam_duration;
        }
        $this->view->page_name = "Add exam page";
    }

    public function addBasicInfoAction() {
        // action body
//        $this->redirect(root_url."/exam/add-exam?name=2");
//        $this->addExamAction("chenfang");
    }

    public function finisheditAction() {
        // action body
        $request = $this->getRequest();
        if ($request->isPost()) {
            $exam_name = $request->getParam("exam_name");
            $exam_no = $request->getParam("exam_no");
            $exam_duration = $request->getParam("exam_duration");
}
    }

}
