<?php
class StudentQuiz extends Controller
{
    public function __construct()
    {
        $this->studentModel = $this->model('studentModel');
        $this->quizModel = $this->model('quizModel');
    }

    public function index($quiz_id = null)
    {
        if ($quiz_id == null) {
            header('Location: /Quiz');
        } else {
            $quiz =  $this->studentModel->getQuiz($quiz_id);
            $questions = $this->quizModel->getQuestions($quiz_id);
            $totalGrade = 0;
            foreach ($questions as $question) {
                $totalGrade += $question->grade;
            }
            $data = [
                'quiz' => $quiz,
                'questions' => $questions,
                'totalGrade' => $totalGrade
            ];
            $this->view('StudentQuiz/Quiz', $data);
        }
    }

    public function attempt($quiz_id = null)
    {
        $quiz =  $this->studentModel->getQuiz($quiz_id);
        $questions = $this->quizModel->getQuestions($quiz_id);
        if ($quiz_id == null) {
            header('Location: /Quiz');
        } else {
            if (!isset($_POST['submit_quiz'])) {

                $totalGrade = 0;
                foreach ($questions as $question) {
                    $totalGrade += $question->grade;
                }
                $data = [
                    'quiz' => $quiz,
                    'questions' => $questions,
                    'totalGrade' => $totalGrade
                ];
                $this->view('StudentQuiz/Attempt', $data);
            } else {
                if ($_POST['submit_quiz'] == "") {
                    unset($_POST['submit_quiz']);
                }
                $correct_answers = [];
                foreach ($questions as $question) {
                    $correct_answers[$question->id] = $question->correct_ans;
                }
                $grade = $this->calculateGrade($_POST, $correct_answers);
                echo 'Your grade is : ' . $grade . ' out of ' . count($questions);
            }
        }
    }

    public function calculateGrade($attempt, $correct_answers)
    {
        return count(array_intersect($attempt, $correct_answers));
    }
}
