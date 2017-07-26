<?php
echo 'file1';

const DB_USER = 'root';
const DB_PASS = 'inform_ato_web';
// вставить имя базы данных
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';

function rights($iduser){
    if($iduser=='user'){
        
    }
    $query="UPDATE". DB_NAME." SET`admin_is` = '1' WHERE `id` = $iduser";
    
}