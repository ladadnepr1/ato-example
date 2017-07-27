<?php
//const DB_USER = 'root';
//const DB_PASS = '';
//const DB_NAME = 'inform_ato_web';
//const DB_HOST = 'localhost';

session_start();
include_once 'config.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['sign_up'])) {
    $log = $_POST['login'];

    $login = mysqli_real_escape_string($dbc, trim($_POST['login']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));


    if (empty($login)) {
        $mes_er = 'Введите логин!';
    }


    if (empty($password)) {
        $mes_er = 'Введите пароль!';
    }

            $query = "SELECT * FROM `users` WHERE name = '$login'";
    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        $hash = $row['pass'];

        if (password_verify($password, $hash)) {
            $_SESSION['username'] = $row['name'];
            //$mes_er = 'Вы авторизованы!';
            mysqli_close($dbc);
            header('Location:../index.php');
            exit;
        } else {
            $mes_er = 'Неверно введен пароль';
        }
    } else {
        $mes_er = 'Пользователь не существует!';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <title>АВТОРИЗАЦИЯ</title>
    </head>
    <body>
        <div id="signup">
            <h3>Авторизируйтесь</h3>
            <p class="err"><?= $mes_er ?></p>
            <p class="norm"><?= $mes ?></p>
            <form method="POST">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <input type="submit" name="sign_up" value="ВХОД">
            </form>
            <div class="signup"><?= $sign ?></div>
        </div>

    </body>
</html>