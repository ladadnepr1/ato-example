<?php
//страница отображения сообщений пользователю - не админу
include_once 'config.php';
//изменить пользователя!!!!!!
//$username=$_SESSION['username'];
 $username='lada';

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
        <title>Сообщения</title>
    </head>
    <body>
        <header>

            <h1>Сообщения для <span><?= $username; ?></span>: непрочитанных *****</h1>
            <a href="http://ato-example/includes/logout.php">ВЫЙТИ</a>
 
        </header>
        <main>
             <?php include_once 'show_text.php'; ?>
             <?php include_once 'show_message.php'; ?>
        </main>
    </body>
</html>