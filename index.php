<?php
include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.php';
//сборка всех частей
//если есть логин в $_SESSION['username'] , определить польз или админ стр 14 Валерий
 if (isset($_SESSION['username'])) {
     if(is_admin( $db,$username)){
	 //если админ , переход на страницу show_admin.php стр 4 Андрей
	 $thisway='show_admin.php';
     }else{
	 //если польз , переход на страницу show.php стр 9 Лада
	 $thisway='show.php';
     }
}else if (!$thisway=filter_input(INPUT_GET, 'thisway')){
    //если нет логина, переход на страницу show_reg_aut.php стр 3 Алексей и стр 13 Ярослав
     $thisway='show_reg_aut.php';
}
//$thisway='show_autor.php';
     


//

//var_dump($thisway);
//$thisway='reg_index.php' ;
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <title>Сообщения</title>
    </head>
    <body>
        <?php include_once './includes/' . $thisway; ?>


    </body>
</html>