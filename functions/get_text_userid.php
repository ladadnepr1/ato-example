<?php

//функция принимает базу данных и номер пользователя
// возвращает выборку заголовки и текст сообщений для пользователя id
function show_text_username($db,$username){
    $query = 'SELECT informs.name,informs.inform,informs_users.readinform FROM informs INNER JOIN informs_users ON informs.id=informs_users.inform_id INNER JOIN users ON users.id=informs_users.user_id WHERE users.name="'.$username.'"';
    return mysqli_query($db, $query);
 
}
//функция при нажатии на ссылку сообщения меняет readinform не null
//и возвращает сообщение по inform_name
function get_inform($db,$username,$inform_name){
    $query_informs_users_id="SELECT informs_users.id FROM informs INNER JOIN informs_users on informs.id=informs_users.inform_id INNER JOIN users on informs_users.user_id=users.id WHERE users.name='".$username."' AND informs.name='".$inform_name."' limit 1";
    $informs_users_id=mysqli_query($db, $query_informs_users_id);
    var_dump($username);
    var_dump($inform_name);
    //$query_readinform ="UPDATE informs_users SET readinform = 2 WHERE informs_users.id = '".."'";
    //mysqli_query($db, $query);
    //$query='';
    //return mysqli_query($db, $query);
}
