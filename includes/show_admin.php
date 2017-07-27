<?php
//страница отображения сообщений админу

include_once 'config.php';
//получаем список пользователей
$query = 'SELECT * FROM users';
$result = mysqli_query($db, $query);
if (!$result) {
    $mes_error .= 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $res .= '<option>' . $row ['name'] . '</option>';
    }
}
//получаем id последнего сообщения
$query = 'SELECT id FROM informs ORDER BY id DESC LIMIT 1';
$result2 = mysqli_query($db, $query);
if (!$result2) {
    $mes_error .= 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
} else {
    $result2=mysqli_fetch_assoc($result2);
    $count= $result2['id'];
}
//принимаем значения с POST
if ($_GET) {
    $title = filter_input(INPUT_GET, 'title');
    $text = filter_input(INPUT_GET, 'text');
    foreach ($_GET['users'] as $user) {
        $count++;
        //записываем сообщение
        $query = "INSERT INTO informs VALUES ($count,'$title','$text')";
        $result3 = mysqli_query($db, $query);
        if (!$result3) {
            $mes_error .= 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
        } else {
            $mes .= 'сообщение добавлено<br>';
        }

        //получаем user_id
        $query = "SELECT id FROM users WHERE name='$user'";
	//echo $user;
        $result4 = mysqli_query($db, $query);
        if (!$result4) {
            $mes_error .= 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
        } else {
            $result4 = mysqli_fetch_assoc($result4);
            $user_id = $result4['id'];
        }
	echo $count;
        //записываем в informs_users    
        $query = "INSERT INTO informs_users VALUES (NULL,'$count','$user_id', NULL)";
        $result4 = mysqli_query($db, $query);
        if (!$result4) {
            $mes_error .= 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
        } else {
            $mes .= 'сообщение связано с юзером<br>';
        }
        
    }
}
?>
<header>

    <h1>Администратор : <span><?= $username; ?></span></h1>
    <a href="../includes/logout.php">ВЫЙТИ</a>

</header>
<main>
            <div id="reg">
            <h3>Форма отправки сообщения</h3>
            <p class="err"><?= $mes_error ?></p>
            <p class="norm"><?= $mes ?></p>
            <form action="#" method="GET" name="message">
                <label>Выберите пользователей:
                    <select size="2" multiple name="users[]">
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
        </div>

</main>