<?php
class Question extends Controller
{
    public function __construct()
    {
        $this->quizModel = $this->model('quizModel');
        $this->adminModel = $this->model('adminModel');
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

    public function update($question_id = null)
    {
        if ($question_id != null) {
            $question = $this->quizModel->getQuestion($question_id);
            $quizes =  $this->adminModel->getQuizes();

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
                ];
                if ($this->quizModel->updateQuestion($data)) {
                    header('Location: /Quiz/Admin/Questions');
                }
            }
        } else {
            $this->view('Question/update');
        }
    }
}