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

    function addItem($hs)
    {
        $sql = "INSERT INTO historic_site(hs_name, hs_description, hs_detail, hs_image, hs_pdf, create_time, cate_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values ($hs));
    }

}