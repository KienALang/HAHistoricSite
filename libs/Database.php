<?php

/**
 *
 */
class Database extends PDO
{

    function __construct()
    {
        parent::__construct("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASSWORD);
    }
}

?>