<?php

/**
 *
 */
class Bootstrap
{

    function __construct()
    {
        $url = $this->getURL();

        //print_r($url);

        $controller = $this->getController($url);
        $this->excuteController($controller, $url);

    }

    private function getURL()
    {
        $url = "index";

        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        }

        $url = rtrim($url, '/'); # right trim url, trim the last right '/'
        return explode("/", $url); # explode the url into an array
    }

    private function getController($url)
    {
        $filePath = "controllers/login.php";
        if ($url != null) {
            $filePath = 'controllers/' . $url[0] . '.php';
        }

        if (!file_exists($filePath)) {
            $filePath = "controllers/mError.php";
            $url = array('MError');
        }

        require $filePath; # Require the controller file
        return new $url[0]; # declare the controller object
    }

    private function excuteController($controller, $url)
    {
        Session::init(); # start the session
        $controller->loadModel($url[0]); # load the Model first
        if (isset($url[2])) { # The 3rd value is a parameter
            $controller->{$url[1]}($url[2]);
        } else if (isset($url[1])) { # the 2nd value is a function
            $controller->{$url[1]}();
        } else {
            $controller->index(); # if there is the 1st value only, the index function will be excuted
        }
    }
}

?>