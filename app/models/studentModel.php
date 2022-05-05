<?php

class studentModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function getQuizes()
    {
        $this->db->query("SELECT * FROM quizes");
        return $this->db->getResultSet();
    }
    public function getQuiz($quiz_id)
    {
        $this->db->query("SELECT * FROM quizes where quiz_id = :quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);
        return $this->db->getSingle();
    }
}
