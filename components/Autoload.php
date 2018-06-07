<?php
//функция автозагрузки
function __autoload($class_name)
{
    //Пути к папкам из которых нужно загружать
    $array_paths = [
        '/models/',
        '/components/'
    ];
    //Цикл формирует путь к файлу с необходимым классом и подключает его если он найден
    foreach ($array_paths as $path) {
        $file = ROOT . $path . $class_name . '.php';
        if (is_file($file)) {
            include_once $file;
        }
    }
}