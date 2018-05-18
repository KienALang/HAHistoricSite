<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/16/2018
 * Time: 8:50
 */
class Category_Model extends Model {
    public function __construct()
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

    function getById($id)
    {
        $sql = "SELECT * FROM category WHERE cate_id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute(array($id));
        $post = $statement->fetchAll();

        $count = $statement->rowCount();
        if ($count == 1) {
            return $post[0];
        } else {
            return null;
        }
    }
}