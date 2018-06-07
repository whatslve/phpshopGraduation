<?php
//Точка входа
session_start();
//общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);
//Константы
define('ROOT', dirname(__FILE__));
//подключение файлов системы
require_once(ROOT . '/components/Autoload.php');


//Вызов Router'a

$router = new Router();
$router->run();