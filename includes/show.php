<?php
//страница отображения сообщений пользователю - не админу
include_once 'config.php';
//изменить пользователя!!!!!!
$_SESSION['username']='lada';
$username=$_SESSION['username'];

?>

<header>

    <h1>Сообщения для <span><?= $username; ?></span>: непрочитанных *****</h1>
    <a href="http://ato-example/includes/logout.php">ВЫЙТИ</a>

</header>
<main>
    <?php include_once 'show_text.php'; ?>
    <?php include_once 'show_message.php'; ?>
</main>
