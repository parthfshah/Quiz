<?php
class Quiz extends Controller
{
    public function __construct()
    {
        $this->quizModel = $this->model('quizModel');
    }

    public function index($quiz_id = null)
    {
        if ($quiz_id != null) {
            $questions = $this->quizModel->getQuestions($quiz_id);
            $quiz  = $this->quizModel->getQuiz($quiz_id);
            $data = [
                'questions' => $questions,
                'quiz' => $quiz
            ];
            $this->view('Quiz/view', $data);
        } else {
            $this->view('Quiz/view');
        }
    }

    public function create()
    {
        if (!isset($_POST['name'])) {
            $this->view('Quiz/create');
        } else {
            $data = [
                'name' => trim($_POST['name'])
            ];
            if ($this->quizModel->createQuiz($data)) {
                header('Location: /Quiz/Admin/Quizes');
            }
        }
    }
}