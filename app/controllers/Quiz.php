<?php
class Quiz extends Controller
{
    public function __construct()
    {
        $this->quizModel = $this->model('quizModel');
    }

    public function index($quiz_id = null)
    {
        $questions = $this->quizModel->getQuestions($quiz_id);
        $quiz  = $this->quizModel->getQuiz($quiz_id);
        $data = [
            'questions' => $questions,
            'quiz' => $quiz
        ];
        $this->view('Quiz/view', $data);
    }
}