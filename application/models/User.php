<?php

class Application_Model_User extends Zend_Db_Table_Abstract {

    protected $_name = "user";
    protected $_primary = "id";

    function insertdb($data) {
        $data1 = array(
            'username' => $data['username'],
            'password' => $data['password']
        );

        $this->insert($data1);
        
    }
    
//    function checkUnique($username){
//        $rows = $this->find(array("username", 'username'));
//        if(count($rows)==0){
//            return TRUE;
//        }else{
//            return FALSE;
//        }
//    }

}
