<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 8:12
 */

class Contact extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index() {
    	$contacts = $this->model->getAll();
    	if (isset($_POST['id'])) {
    		$update = $this->model->updateStatus($_POST['id']);
    	}
    	$this->view->render("contact/index", ['contacts'=> $contacts]);
    }

}