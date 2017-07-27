<?php

//функция принимает базу данных и номер пользователя
// возвращает выборку заголовки и текст сообщений для пользователя id
function show_text_username($db, $username) {
    $query = 'SELECT informs.name,informs.inform,informs_users.readinform,informs_users.inform_id FROM informs INNER JOIN informs_users ON informs.id=informs_users.inform_id INNER JOIN users ON users.id=informs_users.user_id WHERE users.name="' . $username . '"';
    return mysqli_query($db, $query);
}

//функция при нажатии на ссылку сообщения меняет readinform не null
//и возвращает сообщение по inform_id
function get_inform($db, $username, $inform_id) {

    //запрос на изменение readinform не null при вызове этой функции
    $query_informs_users_id = "SELECT informs_users.id,informs_users.readinform FROM informs_users INNER JOIN users on informs_users.user_id=users.id WHERE users.name='$username' AND informs_users.inform_id='$inform_id' limit 1";
    $result = mysqli_query($db, $query_informs_users_id);
    $array = mysqli_fetch_assoc($result);
    if (is_null($array['readinform'])) {
	if (is_null($array['id'])) {
	    echo 'problem3:' . mysqli_errno($db) . ' ' . mysqli_error($db);
	} else {
	    $query_readinform = "UPDATE informs_users SET readinform = 1 WHERE informs_users.id = '" . $array['id'] . "'";
	    $res = mysqli_query($db, $query_readinform);
	}
    }

    //запрос на получение сообщения по inform_id
    $query_informs_users_id = "SELECT informs.inform,informs.name FROM informs WHERE informs.id='" . $inform_id . "'";
    return mysqli_query($db, $query_informs_users_id);
}

//код Валерия+
//функция проверяет есть ли username в $_SESSION['username'].
//Возвращает имя или false
function username_SESSION($username) {
    $username = Fix($_POST['username']); //имя пользователя
    if (isset($_SESSION['USERNAME'])) {
	$username = $_SESSION['USERNAME']; //устанавливает, совпадает ли имя пользователя с сессионным 
	echo "Добропожаловаль .$username"; // die ("<p><a href='continue.php'>Щелкните здесь для продолжения</a></p>");
    } else {//return FALSE;
	echo "Пожалуйста, для входа <a href='authenticate.php'> щелкните здесь</a>";
    }
    session_write_close(); //закрытие сессии
}

function Fix($str) { //очистка полей
    $str = trim($str);
    if (get_magic_quotes_gpc()) {
	$str = stripslashes($str); //Удаляет экранирование символов, произведенное функцией addslashes()
    }
    return mysql_real_escape_string($str);
}


//========================================================
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
 * функция проверяет при помощи функции is_admin() права, и если 'user' - то изменяет их на 'admin', а если  'admin' - меняет на 'user'.При этом выводит сообщение об успехе или ошибке. 
 * 
 * @param int $iduser
 *  id пользователя
 */
function rights( $iduser) {
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$db) {
        echo 'трабл при подключении к СУБД: ' . mysqli_connect_error() . ' ' . mysqli_connect_errno();
    } else {
        //echo 'подлючение успешно';
        if (is_admin($iduser) == 'user') {
            $query = "UPDATE `users` SET `admin_is` = '1' WHERE `id` = $iduser";
            $result = mysqli_query($db, $query);
            if (!$result) {
                echo 'результат не был получен: ' . mysqli_error($db) . ' ' . mysqli_errno($db);
            } else {
                echo 'права пользователя изменены на админские';
            }
        }
    }
}

//====================================



