<?php

require('models/category_model.php');
require_once 'services/historic_site_service.php';

class Historic_Site extends Controller
{
    private $hsService;
    function __construct()
    {
        parent::__construct();
        $this->hsService = new Historic_Site_Service();
    }

    function index()
    {
        $hs = $this->model->getAll();
        $this->view->render("historic_site/index", ['hs' => $hs]);
    }

    function create()
    {
        $hs = array();
        $errorImage = "";
        $errorPdf = "";

        if (isset($_POST['submit'])) {
            $hs_name = $_POST['hs_name'];
            $hs_description = $_POST['hs_description'];
            $hs_detail = $_POST['hs_detail'];
            $cate_id = $_POST['cate_id'];
            $hs_image = "";
            $hs_pdf = "";
            $flag = 0;

            if (isset($_FILES['hs_image'])) {
                if ($_FILES['hs_image']['name'] == NULL) {
                    $errorImage = 'Bạn chưa nhập File';
                } else {
                    $image_old = explode(".", $_FILES['hs_image']['name']);
                    $image_type = explode("/", $_FILES['hs_image']['type']);
                    $hs_image = $image_old[0] . "-" . time() . "." . $image_old[1];
                    if ($image_type[0] === "image") {
                        $flag = 1;
                        move_uploaded_file($_FILES['hs_image']['tmp_name'], './upload/images/' . $hs_image);
                    } else {
                        $errorImage = 'Hãy nhập File ảnh !';
                    }

                }
            }

            if (isset($_FILES['hs_pdf'])) {
                if ($_FILES['hs_pdf']['name'] == NULL) {
                } else {
                    $pdf_old = explode(".", $_FILES['hs_pdf']['name']);
                    $pdf_type = explode("/", $_FILES['hs_pdf']['type']);
                    $hs_pdf = $pdf_old[0] . "-" . time() . "." . $pdf_old[1];
                    if ($pdf_old[1] === "pdf") {
                        move_uploaded_file($_FILES['hs_pdf']['tmp_name'], './upload/pdfs/' . $hs_pdf);
                    } else {
                        $errorPdf = 'Hãy nhập File PDF !';
                        $flag = 0;
                    }

                }
            }
            $hs = array(
                'hs_name' => $hs_name,
                'hs_description' => $hs_description,
                'hs_detail' => $hs_detail,
                'hs_image' => $hs_image,
                'hs_pdf' => $hs_pdf,
                'create_time' => date('Y/m/d H:i:s'),
                'cate_id' => $cate_id,
            );

            if ($flag == 1) {
                $this->doCreate($hs);
            } else {
                if ($hs_image !== "") {
                    if (file_exists("./upload/images/" . $hs_image)) unlink("./upload/images/" . $hs_image);
                }
                if ($hs_pdf !== "") {
                    if (file_exists("./upload/pdfs/" . $hs_pdf)) unlink("./upload/pdfs/" . $hs_pdf);
                }
            }
        }

        $categoryModel = new Category_Model;
        $cats = $categoryModel->getAll();
        $this->view->render("historic_site/create", ['hs' => $hs, 'cats' => $cats, 'errorImage' => $errorImage, 'errorPdf' => $errorPdf]);
    }

    function doCreate($hs)
    {
        $this->model->addItem($hs);
        header("location: index?msg=1");
    }

    function viewUpdateForm($id)
    {
        $post = $this->model->getById($id);
        $this->viewForm(['post' => $post]);
    }

    private function viewForm($array)
    {
        $cateModel = new Category_Model();
        $categories = $cateModel->getAll();
        $array['categories'] = $categories;
        $this->view->render("historic_site/update", $array);
    }

    function doUpdate()
    {
        $newPost = array(
            'hs_id' => $_POST['hs_id'],
            'hs_name' => $_POST['hs_name'],
            'cate_id' => $_POST['cate_id'],
            'hs_description' => $_POST['hs_description'],
            'hs_detail' => $_POST['hs_detail'],
            'update_time' => $this->getCurrentDateTime()
        );
        $image = $_FILES['hs_image'];
        $pdf = $_FILES['hs_pdf'];
        require_once 'services/file_service.php';
        $fileService = new File_Service();
        $errors = null;
        if ($image['size'] > 0 && ($imgErr = $fileService->validateFile($image, 'image')) != null) {
            $errors['hs_image'] = $imgErr;
        }
        if ($pdf['size'] > 0 && ($pdfErr = $fileService->validateFile($pdf, 'pdf')) != null) {
            $errors['hs_pdf'] = $pdfErr;
        }
        if (empty($errors)) {
            if ($image['size'] > 0) {
                $targetDir = $fileService->upload($image, 'image');
                $newPost['hs_image'] = $targetDir;
            }
            if ($pdf['size'] > 0) {
                $targetDir = $fileService->upload($pdf, 'pdf');
                $newPost['hs_pdf'] = $targetDir;
            }
            $oldPaths = $this->model->getFilePaths($newPost['hs_id']);
            $fileService->remove($oldPaths);
            $this->hsService->update($newPost);
            // View new post detail.
            // by now, I go to the list of post
            $this->index();
        } else {
            $this->viewForm(['post' => $newPost, 'errors' => $errors]);
        }

    }

    function getCurrentDateTime()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return date('Y-m-d H:i:s', time());
    }
}