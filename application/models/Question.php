<?php

class Application_Model_Question extends Zend_Db_Table_Abstract {

    protected $_name = "question";
    protected $_primary = "id";

    public function insertdb($dataInsert) {
        $data = array(
            'exam_name' => $dataInsert['exam_name'],
            'exam_question_id' => $dataInsert['exam_question_id'],
            'title' => $dataInsert['title'],
            'A' => $dataInsert['A'],
            'B' => $dataInsert['B'],
            'C' => $dataInsert['C'],
            'D' => $dataInsert['D'],
             'result'=>$dataInsert['result']
        );

        $this->insert($data);
    }
    
    public function getQuestionsByExamName($exam_name){
         $select = $this->select()->where('exam_name = ?', $exam_name);
        $rows = $this->fetchAll($select);
        return $rows;
    }

}
