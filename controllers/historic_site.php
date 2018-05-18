<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 8:02
 */
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

    function viewUpdateForm($id)
    {
        $post = $this->model->getById($id);
        $this->viewForm(['post' => $post]);
    }

    private function viewForm($array)
    {
        require 'models/category_model.php';
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

        if ($pdf['size'] > 0 && ($pdfErr = $fileService->validateFile($pdf, 'pdf')) != null){
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