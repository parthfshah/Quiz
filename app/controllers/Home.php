<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('adminModel');
        $quizes =  $this->adminModel->getQuizes();
    }

    public function index()
    {
        $quizes =  $this->adminModel->getQuizes();
        $this->view('Home/home', $quizes);
    }
}
