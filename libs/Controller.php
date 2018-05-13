<?php

/**
 *
 */
class Controller
{

    function __construct()
    {
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