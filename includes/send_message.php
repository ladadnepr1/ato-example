<?php
include_once 'config.php';

//принимаем значения с POST
if (isset($_POST['reg'])) {
    $name = mysqli_real_escape_string($db, trim($_POST['username']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $pass = mysqli_real_escape_string($db, trim($_POST['pass']));
    $pass2 = mysqli_real_escape_string($db, trim($_POST['pass2']));

    //проверка на пустые поля
    if (!empty($name) && !empty($email) && !empty($pass) && !empty($pass2)) {
        //проверка на совпадение паролей
        if ($pass == $pass2) {
            //проверка на совпадение логина
            $query = "SELECT * FROM `users` WHERE name = '$name'";
            $data = mysqli_query($db, $query);
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
        <title>Отправка сообщения</title>
    </head>
    <body>
        <div id="reg">
            <h3>Форма отправки сообщения</h3>
            <p class="err"><?= $mes_er ?></p>
            <p class="norm"><?= $mes ?></p>
            <form method="POST">
                <label>Выберите пользователей:
                    <select size="1" multiple name="users">
                        <option><?php ?> User1</option>
                    </select>
                </label><br/><br/>
                <input type="submit" name="reg" value="Отправить сообщение">
            </form>
            <div class="signup"><?= $sign ?></div>
        </div>

    </body>
</html>