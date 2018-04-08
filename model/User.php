<?php

require_once "Model.php";

class User extends Model {
    /**
     * Add single users items to database
     */
    public function addUser($user)
    {
        try {
            if (isset($user)) {
                $resultMessage = $this->registrationValidation($user);
                if (empty($resultMessage)) {
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
                    if($result->execute()) $resultMessage[] = 'Вы успешно зарегистрированы!';
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Returns single user items with specified id
     * @rapam integer &id
     */
    public function getUsersList($min, $max)
    {
        try {
            $sql = 'SELECT * FROM users ORDER BY login ASC LIMIT ?, ?';
            $result = $this->db->prepare($sql);
            $result->bindValue(1, $min, PDO::PARAM_INT);
            $result->bindValue(2, $max, PDO::PARAM_INT);
            $result->execute();
            $usersList = $result->fetchAll();
            return $usersList;
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    /**
     * Returns single user items with specified id
     * @rapam integer &id
     */
    public function getUserByID($id)
    {
        try {
            $id = intval($id);
            if (isset($id)) {
                $sql = 'SELECT * FROM users WHERE id = ?';
                $result = $this->db->prepare($sql);
                $result->bindValue(1, $id, PDO::PARAM_INT);
                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $usersItem = $result->fetch();
                return $usersItem;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function updateUser($user)
    {
        try {
            if (isset($user)) {
                $resultMessage = $this->updateValidation($user);
                if (empty($resultMessage)) {
                    $sql = "UPDATE users SET fname = :name, surname = :surname, login = :login, email = :email WHERE id = :id";
                    $result = $this->db->prepare($sql);
                    $result->bindParam(":id", $user['id'], PDO::PARAM_INT);
                    $result->bindParam(":login", $user['login']);
                    $result->bindParam(":email", $user['email']);
                    $result->bindParam(":name", $user['fname']);
                    $result->bindParam(":surname", $user['surname']);
                    if($result->execute()) $resultMessage[] = 'Успешно изменено!';
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function login($user)
    {
        try {
            if (isset($user)) {
                $resultMessage = $this->authValidation($user);
                if (empty($resultMessage)) {
                    $sql = "SELECT id, login, password, admin FROM users where login = ? ";
                    $sth = $this->db->prepare($sql);
                    $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
                    $sth->execute();
                    $sth->setFetchMode(PDO::FETCH_ASSOC);
                    $userResult = $sth->fetch();
                    $_SESSION['logged'] = $userResult;
                }
                return $resultMessage;
            }
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function countUsers()
    {
        try {
            $sql = "SELECT COUNT(*) FROM users";
            $sth = $this->db->prepare($sql);
            $sth->execute();
            $row = $sth->fetch();
            $total = $row[0];
            return $total;
        } catch (PDOException $e) {
            return 'Подключение не удалось: ' . $e->getMessage();
        }
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

    private function updateValidation($user)
    {
        $errors = array();
        $sql = "SELECT login FROM users WHERE login = ? AND id != ?";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(1, $user['login'], PDO::PARAM_STR);
        $sth->bindValue(2, $user['id'], PDO::PARAM_INT);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $loginResult = $sth->fetch();
        if ($loginResult) $errors[] = 'Пользователь с таким логином уже зарегистрирован';
        if (empty($user['fname'])) $errors[] = 'Имя не введено';
        if (!preg_match('/^[a-zA-Zа-яА-Я-]{4,20}$/u', $user['fname'])) $errors[] = 'Некорректное имя';
        if (empty($user['surname'])) $errors[] = 'Фамилия не введена';
        if (!preg_match('/^[a-zA-Zа-яА-Я-]{4,20}$/u', $user['surname'])) $errors[] = 'Некорректная фамилия';
        if (empty($user['email'])) $errors[] = 'Email не введен';
        if (empty($user['login'])) $errors[] = 'Логин не введен';
        return $errors;
    }
}