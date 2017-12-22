<?php

/**
 * Created by PhpStorm.
 * User: handy
 * Date: 21.12.17
 * Time: 0:08
 */
class Database
{
    public static function getConnection()
    {
        $paramsPath = 'db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }

}