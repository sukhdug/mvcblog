<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 18.01.18
 * Time: 17:48
 */
class User
{
    /**
     * Add single users items to database
     */
    public function addUser($user)
    {
        if (isset($user)) {

            $password = password_hash($user['password'], PASSWORD_DEFAULT);
            $admin = 0;
            $db = Database::getConnection();
            $sql = "INSERT INTO users (login, email, fname, surname, password, admin) VALUES (:login, :email, :name, :surname, :password, :admin)";
            $result = $db->prepare($sql);
            $result->bindParam(":login", $user['login']);
            $result->bindParam(":email", $user['email']);
            $result->bindParam(":name", $user['name']);
            $result->bindParam(":surname", $user['surname']);
            $result->bindParam(":password", $password);
            $result->bindParam(":admin", $admin);
            $result = $result->execute();

            return $result;
        }
    }

}