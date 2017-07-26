<?php

const DB_USER = 'root';
const DB_PASS = '';
// вставить имя базы данных
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$path_functions=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'functions';
$files=scandir($path_functions);
if($files){
    foreach($files as $value){
        include_once $value;
    }
}




