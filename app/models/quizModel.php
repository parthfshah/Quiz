<?php

    class quizModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function getQuiz($quiz_id){
            $this->db->query("SELECT * FROM quizes where quiz_id = :quiz_id");
            $this->db->bind(':quiz_id', $quiz_id);
            return $this->db->getSingle();
        }
    
        public function getQuestions($quiz_id){
            $this->db->query("SELECT * FROM questions where quiz_id = :quiz_id");
            $this->db->bind(':quiz_id', $quiz_id);
            return $this->db->getResultSet();
        }

        public function getQuestion($question_id){
            $this->db->query("SELECT * FROM questions where id = :question_id");
            $this->db->bind(':question_id', $question_id);
            return $this->db->getSingle();
        }

        
    }
?>