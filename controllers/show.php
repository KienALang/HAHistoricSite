<?php

require('./models/historic_site_model.php');
require('./models/category_model.php');
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
        $hs = $historicSiteModel->getItemsById($id);
        $this->view->render("show/historic", ['hs'=> $hs]);
    }

}