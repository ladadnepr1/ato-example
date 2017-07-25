<?php


const DB_USER = 'root';
const DB_PASS = '';
// вставить имя базы данных
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';

function rights(){
    filter_input($_POST, $variable_name);
}

function is_admin( int $userid){
    $query='SELECT  `admin_is` FROM `users` WHERE id='.$userid;
    if(mysqli_query($db, $query)){
        return 'admin';
    } else {
        return 'user';
    }
       
}



//SELECT informs.name,informs.inform FROM informs INNER JOIN informs_users ON informs.id=informs_users.inform_id WHERE informs_users.user_id='.$userid