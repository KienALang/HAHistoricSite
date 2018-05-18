<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 10:10
 */

class Historic_Site_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT h.*, c.cate_name FROM historic_site AS h INNER JOIN category AS c ON h.cate_id = c.cate_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getById($id)
    {
        $sql = "SELECT * FROM historic_site WHERE hs_id = ?";
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

    function getFilePaths($hs_id)
    {
        $sql = "SELECT hs_image, hs_pdf FROM historic_site WHERE hs_id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute(array($hs_id));
        $paths = $statement->fetchAll();

        $count = $statement->rowCount();
        if ($count == 1) {
            return $paths[0];
        } else {
            return null;
        }
    }

    function update($post)
    {
        $sql = '';
        $bindArr = array();
        foreach ($post as $key => $value) {
            if ($key != 'hs_id') {
                $sql = $sql . $key . '= :' . $key . ', ';
                $bindArr[':' . $key] = $value;
            }
        }

        $sql = rtrim($sql, ", ");
        $bindArr['hs_id'] = $post['hs_id'];
        $sql = 'UPDATE historic_site SET ' . $sql . ' WHERE hs_id = :hs_id';
        $statement = $this->db->prepare($sql);
        return $statement->execute($bindArr);
    }
}