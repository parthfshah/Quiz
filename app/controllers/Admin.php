<?php
class Admin extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['admin']) {
            header('Location: /Quiz/Home');
        } else {
            $this->adminModel = $this->model('adminModel');
            $this->quizModel = $this->model('quizModel');
        }
    }


    public function index()
    {
        $quizes =  $this->adminModel->getQuizes();
        $questions = $this->quizModel->getAllQuestions();


        $data = [
            'quizes' => count($quizes),
            'questions' => count($questions)
        ];
        $this->view('Admin/index', $data);
    }
    public function quizes()
    {
        $quizes =  $this->adminModel->getQuizes();

        $data = [
            'quizes' => $quizes
        ];
        $this->view('Admin/Quizes', $data);
    }

    public function questions()
    {
        $questions = $this->quizModel->getAllQuestions();
        $data = [
            'questions' => $questions
        ];
        $this->view('Admin/Questions', $data);
    }


    public function editQuiz($quiz_id)
    {
        $quiz  = $this->quizModel->getQuiz($quiz_id);
        if (!isset($_POST['edit'])) {
            $this->view('Quiz/edit', $quiz);
        } else {
            $data = [
                'name' => trim($_POST['name']),
                'quiz_id' => $quiz_id
            ];
            if ($this->quizModel->editQuiz($data)) {
                header('Location: /Quiz/Admin/Quizes');
            }
        }
    }

    public function deleteQuiz($quiz_id)
    {
        if ($this->quizModel->deleteQuiz($quiz_id)) {
            header('Location: /Quiz/Admin');
        }
    }
}
