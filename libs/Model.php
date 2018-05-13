<?php

/**
 *
 */
class Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->db->exec("set names utf8"); # to enable support unicode
    }
}

?>