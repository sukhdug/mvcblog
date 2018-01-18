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

    public function login($user)
    {
        if (isset($user)) {

            $result = array();
            $db = Database::getConnection();
            $sql = "SELECT login, password, admin FROM users where login= ? ";
            $sth = $db->prepare($sql);
            $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $userResult = $sth->fetch();

            if (!$userResult) {

                $result[] = 'Логин не найден';

            } elseif (!password_verify($user['password'], $userResult['password'])) {

                $result[] = 'Введен неверный пароль';

            } else {
                $_SESSION['logged'] = $userResult;
                $result[] = 'Вы вошли';
            }

            return $result;

        }
    }

}