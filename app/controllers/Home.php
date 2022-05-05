<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->studentModel = $this->model('studentModel');
        $quizes =  $this->studentModel->getQuizes();
    }

    public function index()
    {
        $quizes =  $this->studentModel->getQuizes();
        $this->view('Home/home', $quizes);
    }
}
