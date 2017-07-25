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
        if($value!='.' and $value!='..')
            include_once $path_functions.DIRECTORY_SEPARATOR.$value;
    }
}