<?php

/**
 *
 */
class Controller
{
    public $view;

    function __construct($isAuthRequired = false)
    {
        $this->view = new View();
        if ($isAuthRequired) {
            Session::init();
            $logged = Session::get('loggedIn');
            if (!$logged) {
                header('location: authentication');
                exit;
            }
        }

    }

    function loadModel($name)
    {
        $filePath = "models/" . $name . "_model.php";
        if (file_exists($filePath)) {
            require $filePath;
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
}

?>