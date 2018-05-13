<?php

/**
 *
 */
class Employee_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addNew()
    {

    }

    function update($employee)
    {

    }

    function delete($id)
    {

    }
}

?>