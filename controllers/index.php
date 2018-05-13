<?php

/**
 *
 */
class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        //echo "We are in index";
    }

    function index()
    {
        $this->view->render('index');
    }
}

?>