<?php
/**
 * проверка не прочитанных сообщений
 * @param type $username
 * @return type
 */
function unread_messages($db,$username) {
    $query = "select COUNT(*) FROM informs_users INNER JOIN users ON informs_users.user_id=users.id WHERE users.name='" . $username . "' AND informs_users.readinform IS NULL";
    return $count_inform = mysqli_query($db, $query);
}

