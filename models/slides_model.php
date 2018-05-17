<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/14/2018
 * Time: 10:10
 */

class Slides_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM slides";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getItemById($id)
    {
        $sql = "SELECT * FROM slides WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        $slides = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $slides[0];
        } else {
            return null;
        }
    }

    function addItem($slide)
    {
        $sql = "INSERT INTO slides(name, image) VALUES(?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values ($slide));
    }

    function editItem($slide)
    {
        $sql = "UPDATE slides SET name = ?, image = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values ($slide));
    }

    function delItem($id)
    {
        $sql = "DELETE FROM slides WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array($id));
    }
}