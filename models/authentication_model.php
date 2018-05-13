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

    function doLogin($username, $password)
    {

        $statement = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = md5(:password)");
        $statement->execute(array(':username' => $username, ':password' => $password));
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
        $statement = $this->db->prepare("INSERT INTO user(username, password, roleId, email, fullname) VALUES (?, ?, ?, ?, ?)");
        return $statement->execute($user);
    }
}
