<?php
class Question extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['admin']) {
            header('Location: /Quiz/Home');
        } else {
            $this->quizModel = $this->model('quizModel');
            $this->studentModel = $this->model('studentModel');
        }
    }

    public function details($question_id = null)
    {
        if ($question_id != null) {
            $question = $this->quizModel->getQuestion($question_id);
            $data = [
                'question' => $question
            ];
            $this->view('Question/details', $data);
        } else {
            $this->view('Question/details');
        }
    }

    public function create()
    {
        $quizes =  $this->studentModel->getQuizes();
        $data = [
            'quizes' => $quizes
        ];
        if (!isset($_POST['create'])) {
            $this->view('Question/create', $data);
        } else {
            $data = [
                'quiz_id' => $_POST['quiz_id'],
                'text' => trim($_POST['text']),
                'option_1' => trim($_POST['option_1']),
                'option_2' => trim($_POST['option_2']),
                'option_3' => trim($_POST['option_3']),
                'option_4' => trim($_POST['option_4']),
                'correct_ans' => trim($_POST['correct_ans']),
                'grade' => trim($_POST['grade'])
            ];
            if ($this->quizModel->createQuestion($data)) {
                header('Location: /Quiz/Admin/Questions');
            }
        }
    }

    public function update($question_id = null)
    {
        if ($question_id != null) {
            $question = $this->quizModel->getQuestion($question_id);
            $quizes =  $this->studentModel->getQuizes();

            $data = [
                'question' => $question,
                'quizes' => $quizes
            ];
            if (!isset($_POST['update'])) {
                $this->view('Question/update', $data);
            } else {
                $data = [
                    'id' => $question->id,
                    'quiz_id' => $_POST['quiz_id'],
                    'text' => trim($_POST['text']),
                    'option_1' => trim($_POST['option_1']),
                    'option_2' => trim($_POST['option_2']),
                    'option_3' => trim($_POST['option_3']),
                    'option_4' => trim($_POST['option_4']),
                    'correct_ans' => trim($_POST['correct_ans']),
                    'grade' => trim($_POST['grade'])
                ];
                if ($this->quizModel->updateQuestion($data)) {
                    header('Location: /Quiz/Admin/Questions');
                }
            }
        } else {
            $this->view('Question/update');
        }
    }

    public function delete($question_id = null)
    {
        if ($question_id != null) {
            $question = $this->quizModel->getQuestion($question_id);

            if ($question != null) {
                if ($this->quizModel->deleteQuestion($question_id)) {
                    header('Location: /Quiz/Admin/Questions');
                }
            }
        } else {
            header('Location: /Quiz/Admin/Questions');
        }
    }
}
