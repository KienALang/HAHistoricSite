<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/13/2018
 * Time: 22:41
 */
class Chart extends Controller {
    function __construct()
    {
        parent::__construct();
        // checking session here
    }

    function index() {
        $this->view->render("statistic/chart");
    }
}