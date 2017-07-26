<?php
include_once 'config.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//принимаем значения с POST
if (isset($_POST['reg'])) {
    $name = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
    $pass2 = mysqli_real_escape_string($dbc, trim($_POST['pass2']));

    //проверка на пустые поля
    if (!empty($name) && !empty($email) && !empty($pass) && !empty($pass2)) {
        //проверка на совпадение паролей
        if ($pass == $pass2) {
            //проверка на совпадение логина
            $query = "SELECT * FROM `users` WHERE name = '$name'";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 0) {
                $query = "INSERT INTO `users` (name,email, pass) VALUES ('$name','$email','$pass')";
                mysqli_query($dbc, $query);
                $sign = "<a href='signup.php'>>>>АВТОРИЗАЦИЯ<<<</a>";
                $mes = 'Регистрация Прошла успешно!';
                mysqli_close($dbc);
            } else {
                $mes_er = 'Логин уже существует';
            }
        } else {
            $mes_er = 'Пароли не совпадают !';
        }
    } else {
        $mes_er = 'Заполните все поля!';
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
            <h3>Форма регистрации</h3>
            <p class="err"><?= $mes_er ?></p>
            <p class="norm"><?= $mes ?></p>
            <form method="POST">
                <input type="text" name="username" placeholder="Логин">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pass" placeholder="Пароль">
                <input type="password" name="pass2" placeholder="Пароль повторно">
                <input type="submit" name="reg" value="РЕГИСТРАЦИЯ">
            </form>
            <div class="signup"><?= $sign ?></div>
        </div>

    </body>
</html>