<?php
include_once 'config.php';
//$username=$_SESSION['username'];
//<content>
$inform_name = filter_input(INPUT_GET, 'name');
if (is_null($inform_name)){
    echo 'ВЫБЕРИТЕ СООБЩЕНИЕ'; 
}else if($inform=get_inform($db,$username,$inform_name)){
    echo $inform;
}else{
    echo 'problem2:' . mysqli_errno($db) . ' ' . mysqli_error($db);
}

?>
<content>
    <div class="username">
        <h3>user</h3>
    </div>
    <div class="title">
        <p><?= $inform_name ?></p>
    </div>
    <div class="text">
        <p> <?= $inform ?> </p>
    </div>
</content>