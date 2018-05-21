<?php

require('./models/slides_model.php');
require('./models/category_model.php');
require('./models/historic_site_model.php');

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        //echo "We are in index";
    }

    function index()
    {
        $slidesModel = new Slides_Model;
        $slides = $slidesModel->getAll();

        $categoyModel = new Category_Model;
        $categories = $categoyModel->getAll();

        $historicSiteModel = new Historic_Site_Model;
        $hsOffer = $historicSiteModel->getItemsOffer();
        $hsRecently = $historicSiteModel->getItemsRecently();
        $this->view->render('index',
            [
                'slides' => $slides,
                'categories' => $categories,
                'hsOffer' => $hsOffer,
                'hsRecently' => $hsRecently
            ]);
    }
}

?>