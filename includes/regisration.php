<?php

//include_once 'config.php';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'inform_ato_web';
const DB_HOST = 'localhost';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//принимаем значения с POST
if (isset($_POST['reg'])) {
    $errors = array();
    $log = $_POST['login'];
    $em = $_POST['email'];

    $name = mysqli_real_escape_string($dbc, trim($_POST['login']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $pass1 = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    $pass = password_hash($pass1, PASSWORD_BCRYPT, array('cost'=>12));
    $pass2 = mysqli_real_escape_string($dbc, trim($_POST['pass2']));

    if ($name == '') {
        $errors[] = 'Введите логин!';
    }

    if ($email == '') {
        $errors[] = 'Введите email!';
    }

    if ($pass1 == '') {
        $errors[] = 'Введите пароль!';
    }

    if ($pass2 == '') {
        $errors[] = 'Повторный пароль введен не верно!';
    }

    if ($pass1 != $pass2) {
        $errors[] = 'Пароли не совпадают!';
    }

    $query = "SELECT * FROM `users` WHERE name = '$name'";
    $data = mysqli_query($dbc, $query);
    if (mysqli_num_rows($data) >= 1) {
        $errors[] = 'Логин уже существует!';
    }

    $qwert = "SELECT * FROM `users` WHERE email = '$email'";
    $dt = mysqli_query($dbc, $qwert);
    if (mysqli_num_rows($dt) >= 1) {
        $errors[] = 'Пользователь с таким email уже зарегистрирован';
    }

    if (empty($errors)) {
        $query = "INSERT INTO `users` (name,email, pass) VALUES ('$name','$email','$pass')";
        mysqli_query($dbc, $query);
        $sign = "<a href='signup.php'>>>>АВТОРИЗАЦИЯ<<<</a>";
        $mes = 'Регистрация Прошла успешно!';
        $log = '';
        $em = '';
        mysqli_close($dbc);
    } else {
        $mes_er = array_shift($errors);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <title>Регистрация</title>
    </head>
    <body>
        <div id="reg">
            <h3>РЕГИСТРАЦИЯ</h3>
            <p class="err"><?= $mes_er ?></p>
            <p class="norm"><?= $mes ?></p>
            <form method="POST">
                <input type="text" name="login" placeholder="Логин" value="<?= $log; ?>">
                <input type="email" name="email" placeholder="Email" value="<?= $em; ?>">
                <input type="password" name="pass1" placeholder="Пароль">
                <input type="password" name="pass2" placeholder="Пароль повторно">
                <input type="submit" name="reg" value="РЕГИСТРАЦИЯ">
            </form>
            <div class="signup"><?= $sign ?></div>
        </div>

    </body>
</html>