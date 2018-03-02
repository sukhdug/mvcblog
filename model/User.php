<?php

require_once "Model.php";

class User extends Model {
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
                $sql = "INSERT INTO users (login, email, fname, surname, password, admin) VALUES (:login, :email, :name, :surname, :password, :admin)";
                $result = $this->db->prepare($sql);
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

    /**
     * Returns single user items with specified id
     * @rapam integer &id
     */
    public function getUsersList($min, $max)
    {

        $usersList = array();
        $sql = 'SELECT * FROM users ORDER BY login ASC LIMIT ?, ?';
        $result = $this->db->prepare($sql);
        $result->bindValue(1, $min, PDO::PARAM_INT);
        $result->bindValue(2, $max, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['login'] = $row['login'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['fname'] = $row['fname'];
            $usersList[$i]['surname'] = $row['surname'];
            $i++;
        }

        return $usersList;
    }

    /**
     * Returns single user items with specified id
     * @rapam integer &id
     */
    public function getUserByID($id)
    {
        $id = intval($id);

        if ($id) {
            $sql = 'SELECT * FROM users WHERE id = ?';
            $result = $this->db->prepare($sql);
            $result->bindValue(1, $id, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $usersItem = $result->fetch();

            return $usersItem;
        }
    }

    public function login($user)
    {
        if (isset($user)) {

            $errors = $this->authValidation($user);

            if (empty($errors)) {

                $sql = "SELECT * FROM users where login = ? ";
                $sth = $this->db->prepare($sql);
                $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
                $sth->execute();
                $sth->setFetchMode(PDO::FETCH_ASSOC);
                $userResult = $sth->fetch();
                $_SESSION['logged'] = $userResult;
            }

            return $errors;

        }
    }

    public function countUsers()
    {
        $sql = "SELECT COUNT(*) FROM users";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $row = $sth->fetch();
        $total = $row[0];
        return $total;

    }

    private function authValidation($user)
    {
        $errors = array();
        $sql = "SELECT login, password FROM users where login= ? ";
        $sth = $this->db->prepare($sql);
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
        $sql = "SELECT login FROM users where login= ? ";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $loginResult = $sth->fetch();

        if ($loginResult) $errors[] = 'Пользователь с таким логином уже зарегистрирован';
        if (empty($user['name'])) $errors[] = 'Имя не введено';
        if (!preg_match('/^[a-zA-Zа-яА-Я-]{4,20}$/u', $user['name'])) $errors[] = 'Некорректное имя';
        if (empty($user['surname'])) $errors[] = 'Фамилия не введена';
        if (!preg_match('/^[a-zA-Zа-яА-Я-]{4,20}$/u', $user['surname'])) $errors[] = 'Некорректная фамилия';
        if (empty($user['email'])) $errors[] = 'Email не введен';
        if (empty($user['login'])) $errors[] = 'Логин не введен';
        if (empty($user['password'])) $errors[] = 'Пароль пустой';
        if (empty($user['password2'])) $errors[] = 'Пароль снова не введен';
        if ($user['password'] != $user['password2']) $errors[] = 'Пароль снова введен неправильный';

        return $errors;
    }
}