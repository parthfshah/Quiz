<?php

    class adminModel{
        public function __construct(){
            $this->db = new Model;
        }
    
        public function getQuizes(){
            $this->db->query("SELECT * FROM quizes");
            return $this->db->getResultSet();
        }
    }
?>