<?php

/**
 *
 */
class Authentication_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function doLogin($email, $password)
    {

        $statement = $this->db->prepare("SELECT * FROM admin WHERE email = ? AND password = md5(?)");
        $statement->execute(array($email, $password));
        $users = $statement->fetchAll();

        $count = $statement->rowCount();
        if ($count == 1) {
            return $users[0];
        } else {
            return null;
        }

    }

    function doRegister($user)
    {
        $statement = $this->db->prepare("INSERT INTO admin(full_name, email, password) VALUES (?, ?, ?)");
        return $statement->execute($user);
    }
}
