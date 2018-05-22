<?php

/**
 *
 */
class Authentication extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    { # view the authentication screen
        $loggedIn = Session::get('loggedIn');
        if ($loggedIn == true) {
            header('location: admin');
            exit;
        } else {
            $this->view->render('authentication/login');
        }

    }

    function login()
    { # authentication the user
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->doLogin($email, $password);
    }

    private function doLogin($email, $password)
    {
        $user = $this->model->doLogin($email, $password);
        if ($user != null) {
            Session::set('loggedIn', true);
            Session::set('user', $user);
            header('location: ../admin');
        } else {
            $error = "Tên tài khoản hoặc mật khẩu chưa chính xác!";
            $this->view->render('authentication/login', ['error' => $error]);
        }
    }

    function register($post = false)
    {
        if (!$post) {
            $this->view->render("authentication/register");
        } else {
            $user = array($_POST['username'], md5($_POST['password']), 2, $_POST['email'], $_POST['fullname']);
            $this->model->doRegister($user);

            $this->doLogin($_POST['username'], $_POST['password']);
        }

    }

    function logout()
    { # return the home page
        Session::destroy();
        header('location: ../index');
    }
}
