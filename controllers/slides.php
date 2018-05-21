<?php

class Slides extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $slides = $this->model->getAll();
        $this->view->render("slides/index", ['slides'=> $slides]);
    }

    function create()
    {
    	$slide = array();
    	$errorImage = "";
    	if (isset($_POST['submit']))
	    {
	    	$name = $_POST['name'];
	    	$image = "";
	    	$flag = 0;

	        if (isset($_FILES['image'])) {
	            if ($_FILES['image']['name'] == NULL) {
	                $errorImage = 'Bạn chưa nhập File';
	            } else {
	            	$image_old = explode(".", $_FILES['image']['name']);
	            	$image_type = explode("/", $_FILES['image']['type']);
	            	$image = $image_old[0]."-".time().".".$image_old[1];
	            	if ($image_type[0] === "image") {
	            		$flag = 1;
	            		move_uploaded_file($_FILES['image']['tmp_name'], './upload/slides/'.$image);
	            	} else {
	            		$errorImage = 'Hãy nhập File ảnh !';
	            	}
	            	
	            }
	        }

	        $slide = array('name' => $name, 'image' => $image);

	        if ($flag == 1) {
		        $this->doCreate($slide);
	        } else {
	        	if ($image !== "") {
		    		if (file_exists("./upload/slides/".$image)) unlink("./upload/slides/".$image);
				}
	        }
	    }
	   
        $this->view->render("slides/create", ['slide' => $slide, 'errorImage' => $errorImage]);
    }

    function doCreate ($slide) {
    	$this->model->addItem($slide);
    	header("location: index?msg=1");
    }

    function edit () {
    	$errorImage = "";
    	$success = "";
    	if (isset($_GET['id'])) {
    		$id = $_GET['id'];
    		$slide = $this->model->getItemById($id);

    		if (isset($_POST['submit'])) {
    			$name = $_POST['name'];
		    	$image = "";
		    	$flag = 0;
		    	$old_image = $slide['image'];
		    	$slide = array('name' => $name, 'image' => $old_image, 'id' => $id);
		        if (isset($_FILES['image'])) {
		            if ($_FILES['image']['name'] == NULL) {
		            	$this->doEdit($slide);
		            } else {
		            	$image_old = explode(".", $_FILES['image']['name']);
		            	$image_type = explode("/", $_FILES['image']['type']);
		            	$image = $image_old[0]."-".time().".".$image_old[1];
		            	if ($image_type[0] === "image") {
		            		$flag = 1;
		            		move_uploaded_file($_FILES['image']['tmp_name'], './upload/slides/'.$image);
		            	} else {
		            		$errorImage = 'Hãy nhập File ảnh !';
		            	}
		            	
		            }
		        }
		       
		        if ($flag == 1) {
		        	if (file_exists("./upload/slides/".$old_image)) unlink("./upload/slides/".$old_image);
		        	$slide['image'] = $image;
			        $this->doEdit($slide);
		        } else {
		        	if ($image !== "") {
			    		if (file_exists("./upload/slides/".$image)) unlink("./upload/slides/".$image);
					}
		        }
    		}
    		
    		$this->view->render("slides/edit", ['slide' => $slide, 'errorImage' => $errorImage, 'success' => $success]);
    	} else {
    		header("location: ../error/index");
    	}
    	
    }

    function doEdit($slide)
    {		
		$this->model->editItem($slide);
		$success = "Chỉnh sửa thành công!";
		$errorImage = "";
    	$this->view->render("slides/edit", ['slide' => $slide, 'errorImage' => $errorImage, 'success' => $success]);
    	exit;
    }

    function del () {
    	$success = "";
    	if (isset($_GET['id'])) {
    		$id = $_GET['id'];
    		$slide = $this->model->getItemById($id);
    		$this->model->delItem($id);
    		if (file_exists("./upload/slides/".$slide['image'])) unlink("./upload/slides/".$slide['image']);

    		header("location: index?msg=2");

    	} else {
    		header("location: ../error/index");
    	}
    	
    }

}