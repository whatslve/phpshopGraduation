<?php

class Db
{
    static protected $connection = null; // Cвойство с объектом подключения к базе данных

    public static function getConnection()//функция подключения к базе данных
    {
        if (self::$connection == null) {
            $paramsPath = ROOT . '/config/db_params.php';//загрузка параметров базы данных
            require($paramsPath);


            $dsn = "mysql:host={$settings['host']};dbname={$settings['dbname']};charset={$settings['charset']}";
            self::$connection = new PDO($dsn, $settings['user'], $settings['password'], $opt); //создание объекта базы данныхх
        }
        return self::$connection;
    }
}