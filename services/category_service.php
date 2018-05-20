<?php

/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/20/2018
 * Time: 21:12
 */
class Category_Service
{
    function __construct()
    {
    }

    public function update($category)
    {
        require_once 'models/category_model.php';
        $model = new Category_Model();
        $oldCate = $model->getById($category['cate_id']);
        foreach ($oldCate as $key => $value) {
            if (isset($category[$key]) && $key != 'cate_id' && $oldCate[$key] === $value) {
                unset($oldCate[$key]);
            }
        }
        return $model->update($category);
    }
}