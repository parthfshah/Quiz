<?php
class Quiz extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['admin']) {
            header('Location: /Quiz/Home');
        } else {
            $this->quizModel = $this->model('quizModel');
        }
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
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
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
        } else {
            header('Location: /Quiz/Home');
        }
    }
}
