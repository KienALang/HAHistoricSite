<?php

/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/18/2018
 * Time: 9:32
 */
require 'services/file_service.php';
require 'services/category_service.php';

class Category extends Controller
{
    private $fileService;

    function __construct()
    {
        parent::__construct();
        $this->fileService = new File_Service();
    }

    public function index()
    {
        $categories = $this->model->getAll();
        $this->view->render("category/index", ['categories' => $categories]);
    }

    public function add()
    {
        $cate_image = $this->fileService->upload($_FILES['cate_image'], 'image'); # the image path will be returned
        if ($cate_image != null) {
            $category = array($_POST['cate_name'], $cate_image);
            $this->model->insert($category);
            $data = array('success' => true, 'errors' => null);
        } else {
            $data = array('success' => false, 'errors' => 'Thêm mới không thành công');
        }

        echo json_encode($data);
    }

    public function update()
    {
        $category = array(
            'cate_id' => $_POST['cate_id'],
            'cate_name' => $_POST['cate_name'],
        );

        if (isset($_FILES['cate_image'])) {
            $cate_image = $this->fileService->upload($_FILES['cate_image'], 'image');
            if ($cate_image != null) {
                $category['cate_image'] = $cate_image;
            }
        }

        if ($this->model->update($category)) {
            $data = array('success' => true, 'errors' => null);
        } else {
            $data = array('success' => false, 'errors' => 'Cập nhật không thành công');
        }
        echo json_encode($data);
    }

    public function delete()
    {
        $cate_id = $_POST['cate_id'];
        $isSuccess = false;
        $errors = null;
        if ($cate_id != null) {
            $isSuccess = $this->model->delete($cate_id);
        }
        if (!$isSuccess) {
            $errors = 'Xoá không thành công';
        } else {
            $this->index();
        }
    }
}