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
                $mes = 'Регистрация Прошла успешно!';
                mysqli_close($dbc);
            } else {
                $mes = 'Логин уже существует';
            }
        } else {
            $mes = 'Пароли не совпадают !';
        }
    } else {
        $mes = 'Заполните все поля!';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body>

        <form method="POST">
            <label for="username">Введите ваш логин:</label>
            <input type="text" name="username">
            <label for="username">Введите ваш email:</label>
            <input type="email" name="email">
            <label for="pass">Введите ваш пароль:</label>
            <input type="password" name="pass">
            <label for="pass">Введите ваш пароль еще раз:</label>
            <input type="password" name="pass2">
            <input type="submit" name="reg" value="РЕГИСТРАЦИЯ">
        </form>
        <p class="error"><?= $mes ?></p>
    </body>
</html>