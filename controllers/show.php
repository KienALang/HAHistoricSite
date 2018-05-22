<?php

require('./models/historic_site_model.php');
require('./models/category_model.php');
require('./models/contact_model.php');
class Show extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function category()
    {
    	if (isset($_GET['id'])) {
    		$id = $_GET['id'];
    	} else {
    		header("location: ../error/index");
    	}

    	$historicSiteModel = new Historic_Site_Model;
        $hs = $historicSiteModel->getItemsByCateId($id);
        $categoryModel = new Category_Model;
        $category = $categoryModel->getItemById($id);
        $this->view->render("show/category", ['hs'=> $hs, 'category' => $category]);
    }

    function historic()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header("location: ../error/index");
        }

        $historicSiteModel = new Historic_Site_Model;
        $historicSiteModel->increaseView($id);
        $hs = $historicSiteModel->getItemsById($id);
        $this->view->render("show/historic", ['hs'=> $hs]);
    }

    function search()
    {
        $txtSearch = $_POST['txtSearch'];

        $historicSiteModel = new Historic_Site_Model;
        $hs = $historicSiteModel->getSearch($txtSearch);
        $this->view->render("show/search", ['hs'=> $hs]);
    }

    function contact()
    {
        $check = 0;
        if (isset($_POST['submit'])) {
            $check = 1;
            $contactModel = new Contact_Model;
            $slide = array(
                'name' => $_POST['name'] ,
                'phone' => $_POST['phone'] , 
                'email' => $_POST['email'] , 
                'message' => $_POST['message'] ,     
            );
            $contactModel->addItem($slide);
        } 
        $this->view->render("show/contact", ['check'=> $check]);
    }
    
}