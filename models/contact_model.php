<?php

class Contact_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM contact ORDER BY status ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addItem($contact)
    {
        $sql = "INSERT INTO contact(name, phone, email, message) VALUES(?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values ($contact));
    }

    function updateStatus($id)
    {
        $sql = "UPDATE contact SET status = 1 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array($id));
    }
}