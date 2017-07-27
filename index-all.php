<?php
//const DB_USER = 'root';
//const DB_PASS = '';
//const DB_NAME = 'inform_ato_web';
//const DB_HOST = 'localhost';

include_once './includes/config.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
session_start();
$login = $_SESSION['username'];

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
            <h1>Сообщения для <span><?= $login; ?></span></h1>
            <a href="http://ato-example/includes/logout.php">ВЫЙТИ</a>
        </header>
        <main>
            <div id="lsb">
                <div class="not_read">
                    <ul>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                    </ul>
                </div>
                <div class="read">
                    <ul>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                        <li>
                            <a href="">title сообщения</a>
                        </li>
                    </ul>
                </div>
            </div>
            <content>
                <div class="title">
                    <p>title сообщения</p>
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus harum vero labore officia temporibus rerum magnam reiciendis dolores vitae at suscipit, neque iure officiis in eos eum minima. Expedita, adipisci.</p>
                </div>
            </content>
        </main>
    </body>
</html>