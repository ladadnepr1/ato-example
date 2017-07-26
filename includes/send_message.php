<?php
include_once 'config.php';
//получаем список пользователей
$query = 'SELECT * FROM users';
$result = mysqli_query($db, $query);
if (!$result) {
    echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $res .= '<option>' . $row ['name'] . '</option>';
    }
}
//получаем количество сообщений
$query = 'SELECT * FROM informs';
$result2 = mysqli_query($db, $query);
if (!$result2) {
    echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
} else {
    $count = 1;
    while ($row = mysqli_fetch_assoc($result2)) {
        $count++;
    }
}
//принимаем значения с POST
if ($_GET) {
    $users = filter_input(INPUT_GET, 'users');
    $title = filter_input(INPUT_GET, 'title');
    $text = filter_input(INPUT_GET, 'text');
    //записываем сообщение
    $query = "INSERT INTO informs VALUES ($count,'$title','$text')";
    $result3 = mysqli_query($db, $query);
    if (!$result3) {
        echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
    } else {
        echo 'сообщение добавлено<br>';
    }

    //получаем user_id
    $query = "SELECT id FROM users WHERE name='$users'";
    $result4 = mysqli_query($db, $query);
    if (!$result4) {
        echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
    } else {
        $result4 = mysqli_fetch_assoc($result4);
        $user_id = $result4['id'];
    }

    //записываем в informs_users    
    $query = "INSERT INTO informs_users VALUES (NULL,'$count','$user_id')";
    $result4 = mysqli_query($db, $query);
    if (!$result4) {
        echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
    } else {
        echo 'сообщение связано с юзером<br>';
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
            <form action="#" method="GET" name="message">
                <label>Выберите пользователей:
                    <select size="2" multiple name="users">
                        <?php echo $res; ?>
                    </select>
                </label>
                <br/><br/>
                <label>Заголовок сообщения:
                    <input type="text" name="title"/>
                </label>
                <br/><br/>
                <label>Текст сообщения:
                    <textarea rows="10" cols="45" name="text"></textarea>
                </label>
                <br/><br/>
                <input type="submit" value="Отправить сообщение">
            </form>
            <div class="signup"><?= $sign ?></div>
        </div>

    </body>
</html>