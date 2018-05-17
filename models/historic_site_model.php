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

    function getItemsOffer()
    {
        $sql = "SELECT h.*, c.cate_name FROM historic_site AS h INNER JOIN category AS c ON h.cate_id = c.cate_id ORDER BY RAND() LIMIT 4";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getItemsRecently()
    {
        $sql = "SELECT h.*, c.cate_name FROM historic_site AS h INNER JOIN category AS c ON h.cate_id = c.cate_id ORDER BY h.create_time DESC LIMIT 3";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getItemsByCateId($id)
    {
        $sql = "SELECT h.*, c.cate_name FROM historic_site AS h INNER JOIN category AS c ON h.cate_id = c.cate_id WHERE h.cate_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function getItemsById($id)
    {
        $sql = "SELECT h.*, c.cate_name FROM historic_site AS h INNER JOIN category AS c ON h.cate_id = c.cate_id WHERE h.hs_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        $hs = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $hs[0];
        } else {
            return null;
        }
    }

    function addItem($hs)
    {
        $sql = "INSERT INTO historic_site(hs_name, hs_description, hs_detail, hs_image, hs_pdf, create_time, cate_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values ($hs));
    }

}