<?php



// вставить имя базы данных


/**
 * Функция проверяет является ли пользователь админом
 * @param int $userid
 * id пользователя
 * @return string
 * админ или юзер
 */
//function is_admin( $db,$username){
//    $query="SELECT  `admin_is` FROM `users` WHERE name=$username";
//    var_dump($username);
//    if(mysqli_query($db, $query)){
//        return true;
//    } else {
//        return false;
//    }       
//}
//
//
//
//
///**
// * функция проверяет при помощи функции is_admin() права, и если 'user' - то изменяет их на 'admin', а если  'admin' - меняет на 'user'.При этом выводит сообщение об успехе или ошибке. 
// * 
// * @param int $iduser
// *  id пользователя
// */
//function rights($iduser){
//    $db= mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
//if (!$db){
//    echo 'трабл при подключении к СУБД: '.mysqli_connect_error().' '. mysqli_connect_errno();
//    
//} else {
//    //echo 'подлючение успешно';
//    if(is_admin($iduser)=='user'){
//    $query="UPDATE `users` SET `admin_is` = '1' WHERE `id` = $iduser";
//    $result=mysqli_query($db, $query); 
//    if(!$result){
//        echo 'результат не был получен: '. mysqli_error($db).' '. mysqli_errno($db);
//}else{
//        echo 'права пользователя изменены на админские';
//    }
//    }elseif (is_admin($iduser)=='admin') {
//            $query="UPDATE". DB_NAME." SET `admin_is` = '0' WHERE `id` = $iduser";
//    $result=mysqli_query($db, $query); 
//    if(!$result){
//        echo 'результат не был получен: '. mysqli_error($db).' '. mysqli_errno($db);
//}else{
//        echo 'права админа изменены на пользователя';
//        }
//}
//}
//    
//}
//
