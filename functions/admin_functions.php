<?php

//========Иван
/**
 * Функция проверяет является ли пользователь админом
 * @param int $userid
 * id пользователя
 * @return string
 * админ или юзер
 */
function is_admin($db,$username) {
    $query = "SELECT  `admin_is` FROM `users` WHERE name='$username'";
    $result=mysqli_query($db, $query);
    if($result){
	$row= mysqli_fetch_assoc($result);
	$is_admin=$row['admin_is'];
	if($is_admin){
	    return true;	    
	}
    } 
    return false;
    
}

/**
 * функция проверяет при помощи функции is_admin() права, и если 'user' - то изменяет их на 'admin'
 * 
 * @param int $iduser
 *  id пользователя
 */
function rights($db, $iduser) {
    
    
        //echo 'подлючение успешно';
        if (!is_admin($db,$iduser)) {
            $query = "UPDATE `users` SET `admin_is` = '1' WHERE `name` = '$iduser'";
            $result = mysqli_query($db, $query);
            if (!$result) {
                echo 'результат не был получен: ' . mysqli_error($db) . ' ' . mysqli_errno($db);
            } else {
                echo 'права пользователя изменены на админские';
            }
        }
    
}

//====================================



