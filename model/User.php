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

            $errors = $this->registrationValidation($user);

            if (empty($errors)) {
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
                if($result->execute()) $errors[] = 'Вы успешно зарегистрированы!';
            }

            return $errors;
        }
    }

    public function login($user)
    {
        if (isset($user)) {

            $errors = $this->authValidation($user);

            if (empty($errors)) {

                $db = Database::getConnection();
                $sql = "SELECT login, password, admin FROM users where login= ? ";
                $sth = $db->prepare($sql);
                $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
                $sth->execute();
                $sth->setFetchMode(PDO::FETCH_ASSOC);
                $userResult = $sth->fetch();
                $_SESSION['logged'] = $userResult;
            }

            return $errors;

        }
    }

    private function authValidation($user)
    {
        $errors = array();
        $db = Database::getConnection();
        $sql = "SELECT login, password FROM users where login= ? ";
        $sth = $db->prepare($sql);
        $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $loginResult = $sth->fetch();

        if (empty($user['login'])) $errors[] = 'Логин не введен';
        if (empty($user['password'])) $errors[] = 'Пароль не введен';
        if (!$loginResult) $errors[] = 'Нет пользователя с таким логином';
        if (!password_verify($user['password'], $loginResult['password'])) $errors[] = 'Неправильный пароль';

        return $errors;
    }

    private function registrationValidation($user)
    {
        $errors = array();
        $db = Database::getConnection();
        $sql = "SELECT login FROM users where login= ? ";
        $sth = $db->prepare($sql);
        $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $loginResult = $sth->fetch();

        if ($loginResult) $errors[] = 'Пользователь с таким логином уже зарегистрирован';
        if (empty($user['name'])) $errors[] = 'Имя не введено';
        if (empty($user['surname'])) $errors[] = 'Фамилия не введена';
        if (empty($user['email'])) $errors[] = 'Email не введен';
        if (empty($user['login'])) $errors[] = 'Логин не введен';
        if (empty($user['password'])) $errors[] = 'Пароль пустой';
        if (empty($user['password2'])) $errors[] = 'Пароль снова не введен';
        if ($user['password'] != $user['password2']) $errors[] = 'Пароль снова введен неправильный';

        return $errors;
    }
}