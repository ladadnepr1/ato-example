<?php
// соединение с бд
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// путь на файлы includes
$path_includes= $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR;
//присоединение всех файлов с функциями

$path_functions=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR;
$files=scandir($path_functions);
if($files){
    foreach($files as $value){   
        if(!($value=='.'|| $value=='..' || is_null ($value))){
            include_once $path_functions.$value;
        }
    }
}
// открытие сессии 
session_start();




