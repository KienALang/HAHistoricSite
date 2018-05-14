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
        //$tintuc = load from DB
        $this->view->render('index');
    }
}

?>