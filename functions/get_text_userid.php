<?php

//функция принимает базу данных и номер пользователя
// возвращает выборку заголовки и текст сообщений для пользователя id
function show_text_username($db,$username){
    $query = 'SELECT informs.name,informs.inform,informs_users.readinform FROM informs INNER JOIN informs_users ON informs.id=informs_users.inform_id INNER JOIN users ON users.id=informs_users.user_id WHERE users.name="'.$username.'"';
    return mysqli_query($db, $query);
    
}
