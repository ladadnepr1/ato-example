<?php
include_once '../includes/config.php';
//функция принимает базу данных и номер пользователя
// возвращает выборку заголовки и текст сообщений для пользователя id
function show_text_userid($db,$userid){
    $query = 'SELECT informs.name,informs.inform,informs_users.readinform FROM informs INNER JOIN informs_users ON informs.id=informs_users.inform_id WHERE informs_users.user_id'.$userid;
    return mysqli_query($db, $query);
    
}