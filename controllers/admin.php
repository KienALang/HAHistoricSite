<?php

/**
 *
 */
class Admin extends Controller
{

    function __construct()
    {
        parent::__construct(true);
    }

    function search()
    {
        $keyWords = $_GET['key-word'];
        $users = $this->userModel->search($keyWords);
        $this->view->render("admin/index",
            [
                'users' => $users
            ]
        );
    }

    function delete($id)
    {
        $this->userModel->delete($id);
        $this->view->render("admin/index");
    }

    function edit($id)
    {
        $user = $this->userModel->getUserById($id);
        $this->view->render("admin/edit",
            [
                'userToEdit' => $user
            ]
        );
    }

    function doUpdate()
    {
        $user = array($_POST['username'], $_POST['email'], $_POST['fullName'], $_POST['userId']);
        $this->userModel->update($user);
        $this->index();
    }

    function index()
    {
        //$users = $this->userModel->getAll();

        $this->view->render("admin/index");
    }

    function add()
    {
        $this->view->render("admin/add");
    }

    function doAdd()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fullName = $_POST['fullName'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if ($password == $confirmPassword) {
            $user = array($username, md5($password), 2, $email, $fullName);
            $this->userModel->addNew($user);
            $this->index();
        } else {
            $error = "Confirm Password isn't match the Password";
            $this->view->render("admin/add", ['error' => $error]);
        }
    }


}

?>