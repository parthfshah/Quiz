<?php
class Question extends Controller
{
    public function __construct()
    {
        $this->quizModel = $this->model('quizModel');
    }

    public function details($question_id = null)
    {
        $question = $this->quizModel->getQuestion($question_id);
        $data = [
            'question' => $question
        ];
        
        $this->view('Question/details', $data);
    }
}