<?php
//страница регистрации или авторизации

include_once 'config.php';

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
            <h1>Сообщения пользователя</h1>
        </header>
        <main>
            <div id="lsb">
                <div class="not_read">
                    <ul>
                        <li>
                            <a href="includes/reg.php">АВТОРИЗАЦИЯ</a>
                        </li>
                        <li>
                            <a href="includes/regisration.php">РЕГИСТРАЦИЯ</a>
                        </li>
                    </ul>
                </div>
                
            </div>
            <content>
                <div class="username">
                    <h3>Самый лучший messenger</h3>
                </div>
                <div class="title">
                   
                </div>
                <div class="text">
                    <p>Для входа введите свой логин и пароль.</p>
 
                </div>
            </content>
        </main>
    </body>
</html>