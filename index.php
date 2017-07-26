<?php
include_once 'includes/config.php';
//$username=$_SESSION['username'];
$username="lada";
 
$result = show_text_username($db, $username);
//class="<?= (is_null($row['readinform']) ? "not_read" : "read" );


?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/style.css">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <title>Сообщения</title>
    </head>
    <body>
        <header>
            <h1>Сообщения пользователя</h1>
        </header>
        <main>
             <?php include_once './includes/show_text.php'; ?>
             <?php include_once './includes/show_message.php'; ?>
        </main>
    </body>
</html>