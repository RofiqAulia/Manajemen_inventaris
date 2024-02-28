<?php

class Login extends Controller 
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('login/index', $data);
    }

    public function cek_login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $loginModel = $this->model('Login_model');
            $user = $loginModel->validateUser($username, $password);
    
            if ($user) {
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
    
                if ($_SESSION['level'] === 'admin') {
                    header('Location: ' . BASEURL . '/HomeAdmin');
                } elseif ($_SESSION['level'] === 'user') {
                    header('Location: ' . BASEURL . '/HomeUser');
                } else {
                    header('Location: ' . BASEURL . '/Home');
                }
                exit();
            } else {
                header('Location: ' . BASEURL . '/Login');
                exit();
            }
        } else {
            header('Location: ' . BASEURL . '/Login');
            exit();
        }
    }




    public function logout(){
        session_unset();
        session_destroy();

        header('Location: ' . BASEURL . '/Login');
        exit();
    }
}