<?php

/**
 *
 */
class User_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM user WHERE user_id NOT IN (1)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getUserById($id) {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetchAll()[0];
    }

    function search($keyWords)
    {
        $sql = "SELECT user_id, username, fullname, roleId, email FROM user WHERE username LIKE :username OR fullname LIKE :fullName AND user_id NOT IN (1)";
        $stmt = $this->db->prepare($sql);
        $keyWords = '%' . $keyWords . '%';
        $stmt->execute(array(':username' => $keyWords, ':fullName' => $keyWords));
        return $stmt->fetchAll();
    }

    function addNew($user)
    {
        $sql = "INSERT INTO user(username, password, roleId, email, fullname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($user);
    }

    function update($user)
    {
        $sql = "UPDATE user SET username = ?, email = ?, fullname = ? WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($user);
    }

    function delete($id)
    {
        $sql = "DELETE user WHERE user_id = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute(array($id));
    }
}

?>