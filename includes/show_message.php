<?php
include_once 'config.php';
//$username=$_SESSION['username'];
//<content>
$inform= filter_input(INPUT_POST, 'inform');
$name=filter_input(INPUT_POST, 'name');

?>
<div class="username">
    <h3>user</h3>
</div>
<div class="title">
    <p><?= $name ?></p>
</div>
<div class="text">
    <p> <?= $inform ?> </p>
</div>