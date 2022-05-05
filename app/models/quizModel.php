<?php

class quizModel
{
    public function __construct()
    {
        $this->db = new Model;
    }

    public function getQuiz($quiz_id)
    {
        $this->db->query("SELECT * FROM quizes where quiz_id = :quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);
        return $this->db->getSingle();
    }

    public function createQuiz($data)
    {
        $this->db->query("INSERT into quizes(name) values (:name)");
        $this->db->bind(':name', $data['name']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editQuiz($data)
    {
        $this->db->query("UPDATE quizes set name=:name where quiz_id=:quiz_id");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quiz_id', $data['quiz_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createQuestion($data)
    {
        $this->db->query("INSERT into questions 
        (quiz_id, text, option_1, option_2, option_3, option_4, correct_ans, grade) values
        (:quiz_id, :text, :option_1, :option_2, :option_3, :option_4, :correct_ans, :grade)
        ");
        $this->db->bind(':quiz_id', $data['quiz_id']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':option_1', $data['option_1']);
        $this->db->bind(':option_2', $data['option_2']);
        $this->db->bind(':option_3', $data['option_3']);
        $this->db->bind(':option_4', $data['option_4']);
        $this->db->bind(':correct_ans', $data['correct_ans']);
        $this->db->bind(':grade', $data['grade']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuestion($data)
    {
        $this->db->query("UPDATE questions SET quiz_id=:quiz_id, text=:text, option_1=:option_1, option_2=:option_2, option_3=:option_3, option_4=:option_4, correct_ans =:correct_ans, grade=:grade where id=:id");
        $this->db->bind(':quiz_id', $data['quiz_id']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':option_1', $data['option_1']);
        $this->db->bind(':option_2', $data['option_2']);
        $this->db->bind(':option_3', $data['option_3']);
        $this->db->bind(':option_4', $data['option_4']);
        $this->db->bind(':correct_ans', $data['correct_ans']);
        $this->db->bind(':grade', $data['grade']);

        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteQuiz($quiz_id)
    {
        $this->db->query("DELETE from quizes where quiz_id = :quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);
        return $this->db->execute();
    }

    public function deleteQuestion($question_id)
    {
        $this->db->query("DELETE from questions where id = :question_id");
        $this->db->bind(':question_id', $question_id);
        return $this->db->execute();
    }

    public function getAllQuestions()
    {
        $this->db->query("SELECT * FROM questions");
        return $this->db->getResultSet();
    }

    public function getQuestions($quiz_id)
    {
        $this->db->query("SELECT * FROM questions where quiz_id = :quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);
        return $this->db->getResultSet();
    }

    public function getQuestion($question_id)
    {
        $this->db->query("SELECT * FROM questions where id = :question_id");
        $this->db->bind(':question_id', $question_id);
        return $this->db->getSingle();
    }
}
