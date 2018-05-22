<?php

/**
 *
 */
class Controller
{

    function __construct($isAuthRequired = false)
    {
        if ($isAuthRequired) {
            $logged = Session::get('loggedIn');
            if (!$logged) {
                Session::destroy();
                header('location: authentication');
                exit;
            }
        }
        $this->view = new View();
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