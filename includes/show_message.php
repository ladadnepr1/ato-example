<?php
include_once 'config.php';

//<content>
$inform_id = filter_input(INPUT_GET, 'inform_id');


if (is_null($inform_id)) {
    $mes = 'ВЫБЕРИТЕ СООБЩЕНИЕ';
} else if ($inform = get_inform($db, $username, $inform_id)) {
    $row = mysqli_fetch_assoc($inform);
    $inform_name = $row['name'];
    $mes = $row['inform'];
} else {
    $mes = 'problem2:' . mysqli_errno($db) . ' ' . mysqli_error($db);
}
?>
<content>
    <div class="username">
        <h3> непрочитанных *****</h3>
    </div>
    <div class="title">
        <p><?= $inform_name ?></p>
    </div>
    <div class="text">
        <p> <?= $mes ?> </p>
    </div>
</content>