<?php
        class myModel extends CI_Model{
            public function __construct() {
                parent::__construct();
                $this->load->database();
            }
            public function insertData($data){
                $this->db->insert('temp',$data);
                return TRUE;
            }
        }
?>