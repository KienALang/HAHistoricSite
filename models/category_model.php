<?php

/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/18/2018
 * Time: 9:33
 */
class Category_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($cate_id)
    {
        $sql = "SELECT * FROM category WHERE cate_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$cate_id]);
        $categories = $stmt->fetchAll();

        $count = $stmt->rowCount();
        if ($count == 1) {
            return $categories[0];
        } else {
            return null;
        }
    }

    public function insert($category)
    {
        $sql = "INSERT INTO category(cate_name, cate_image) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($category);
    }

    public function update($category)
    {
        $sql = '';
        $bindArr = array();
        foreach ($category as $key => $value) {
            if ($key != 'cate_id') {
                $sql = $sql . $key . '= :' . $key . ', ';
                $bindArr[':' . $key] = $value;
            }
        }
        $sql = rtrim($sql, ", ");
        $bindArr['cate_id'] = $category['cate_id'];
        $sql = 'UPDATE category SET ' . $sql . ' WHERE cate_id = :cate_id';
        $statement = $this->db->prepare($sql);
        return $statement->execute($bindArr);
    }

    public function delete($cate_id)
    {
        $sql = "DELETE category FROM category WHERE cate_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$cate_id]);
    }
}