<?php

//require "../clouding/data/fpdf/fpdf.php";
//define("TEM", "")
include "indexController.php";

class ExamController extends Zend_Controller_Action
{

    public function init()
    {
      
    }

    public function indexAction()
    {
        $this->checkIdentity();
        $exam_name = $_POST['exam_name'];
        //get the exam information
        $exam_table = new Application_Model_Exam();
        $info_rows = $exam_table->getInfoOfExam($exam_name);
        $this->view->basic_info = $info_rows;

        //get all the questions
        $questions_table = new Application_Model_Question();
        $questions_rows = $questions_table->getQuestionsByExamName($exam_name);
        $this->view->questions = $questions_rows;

        //set the title
        $this->view->page_name = "Exam Info";
    }

    public function addExamAction()
    {
                $this->checkIdentity();

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
        return;
    }

    public function addBasicInfoAction()
    {
                $this->checkIdentity();

    }

    public function finishEditAction()
    {
                $this->checkIdentity();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $exam_name = $request->getParam("exam_name");
            $exam_no = $request->getParam("exam_no");
            $exam_duration = $request->getParam("exam_duration");
            $_username = Zend_Auth::getInstance()->getStorage()->read()->username;

            for ($i = 0; $i < $exam_no; $i++) {
                $title = $request->getParam("title_" . $i);
                $answerA = $request->getParam("answerA_" . $i);
                $answerB = $request->getParam("answerB_" . $i);
                $answerC = $request->getParam("answerC_" . $i);
                $answerD = $request->getParam("answerD_" . $i);
                $result = $request->getParam("result_" . $i);
                $data = array(
                    'exam_name' => $exam_name,
                    'exam_question_id' => $i,
                    'title' => $title,
                    'A' => $answerA,
                    'B' => $answerB,
                    'C' => $answerC,
                    'D' => $answerD,
                    'result' => $result
                );
                $question_table = new Application_Model_Question();
                $question_table->insertdb($data);
            }

            $exam_table = new Application_Model_Exam();
            $exam_table->insertdb(array(
                'exam_name' => $exam_name,
                'username' => $_username,
                'total_question' => $exam_no,
                'duration' => $exam_duration
            ));
        }
        $this->redirect(root_url . "/user/index");
    }

    public function downloadPaperAction()
    {
                $this->checkIdentity();
        $this->_helper->layout->disableLayout();
        $model = new Application_Model_PdfGenerate();
        $model->generate_exam($_POST['exam_name']);
    }

    public function downloadReportAction()
    {
        // action body
                $this->checkIdentity();

    }

    public function startExamAction()
    {
          
    }

    public function finishExamAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $exam_name = $request->getParam("exam_name");
            $total_question = $request->getParam("total_question");
            $exam_duration = $request->getParam("exam_duration");
            $rank=$request->getParam("rank");
            $student_name=$request->getParam("student_name");
            
            for($i=0;$i<$total_question;$i++){
                $answer=$this->getParam("answer_".$i);
            }
        }
    }

    private function checkIdentity(){
          if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect(root_url . '/index/index');
        }

        $_username = Zend_Auth::getInstance()->getStorage()->read()->username;
        $this->view->username = $_username;
    }

}




