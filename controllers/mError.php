<?php

class MError extends Controller
{

    function __construct()
    {
        parent::__construct();
        //echo "<br>That was an error. The page you access isn't exists!";
    }

    function index()
    {
        $this->view->render('error/index');
    }
}
