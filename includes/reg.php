<?php
        
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Введите ваш логин:</label>
            <input type="text" name="name">
            <label for="pass">Введите ваш пароль:</label>
            <input type="password" name="pass">
            <label for="pass">Введите ваш пароль еще раз:</label>
            <input type="password" name="pass2">
            <input type="submit" name="reg" value="РЕГИСТРАЦИЯ">
        </form>
    </body>
</html>