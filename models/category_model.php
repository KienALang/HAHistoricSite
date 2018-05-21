<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 10:10
 */

class Category_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getItemById($id)
    {
        $sql = "SELECT * FROM category WHERE cate_id = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        $categories = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $categories[0];
        } else {
            return null;
        }
    }


}