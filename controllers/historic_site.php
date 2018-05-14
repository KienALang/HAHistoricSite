<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 8:02
 */

class Historic_Site extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $hs = $this->model->getAll();
        $this->view->render("historic_site/index", ['hs'=> $hs]);
    }
}