<?php

const DB_USER = 'root';
const DB_PASS = '';
// вставить имя базы данных
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//Проверка соединения с БД
if (!$db) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//
$path_functions=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR;
$files = array_slice(scandir($path_functions), 2);
if($files){
    foreach($files as $value){
        include_once $path_functions.$value;
    }
}




