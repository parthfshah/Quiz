<?php
class Admin extends Controller
{
    public function __construct()
    {
        if(!$_SESSION['admin']){
            header('Location: /Quiz/Home');
        }
        else{
            $this->adminModel = $this->model('adminModel');
        }
    }

    public function index()
    {
        $quizes =  $this->adminModel->getQuizes();
        
        $data = [
            'quizes' => $quizes
        ];
        $this->view('Admin/index', $data);
    }
}