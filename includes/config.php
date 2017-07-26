<?php

const DB_USER = 'root';
const DB_PASS = '';
// вставить имя базы данных
const DB_NAME = '';
const DB_HOST = 'localhost';
$path_functions=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'functions';
$files=scandir($path_functions);
if($files){
    foreach($files as $value){
        include_once $value;
    }
}
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//присоединение всех файлов с функциями
$path_functions=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'functions/';
$files=scandir($path_functions);
if($files){
    foreach($files as $value){
        
        if(!($value=='.'|| $value=='..' || is_null ($value))){
            var_dump($value);
            include_once $path_functions.$value;
        }
    }
}




