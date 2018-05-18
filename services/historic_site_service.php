<?php

/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/17/2018
 * Time: 1:37
 */
class Historic_Site_Service
{
    function __construct()
    {
    }

    public function validate($newPost)
    {
        if ($newPost['hs_name'] === "") {
            return 'Tiêu đề bài viết không bị bỏ trống';
        } //

        return null;
    }

    public function update($newPost)
    {
        require_once 'models/historic_site_model.php';
        $model = new Historic_Site_Model();
        $oldPost = $model->getById($newPost['hs_id']);
        foreach ($oldPost as $key => $value) {
            if (isset($newPost[$key]) && $newPost[$key] === $value && $key != 'hs_id') {
                unset($newPost[$key]);
            }
        }

        $model->update($newPost);
    }
}