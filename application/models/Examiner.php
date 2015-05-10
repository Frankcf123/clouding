<?php

class Application_Model_Examiner extends Zend_Db_Table_Abstract {

    protected $_name = "examiner";
    protected $_primary = "id";

    public function insertdb($dataInsert) {

        $data = array(
            'examiner_name' => $dataInsert['examiner_name'],
            'exam_name' => $dataInsert['exam_name'],
            'rank' => $dataInsert['rank'],
            'possible_mark' => $dataInsert['possible_mark'],
            'mark' => $dataInsert['mark'],
            'duration'=>$dataInsert['duration'],
            'possible_duration'=>$dataInsert['possible_duration']
        );

        $this->insert($data);
    }

}
