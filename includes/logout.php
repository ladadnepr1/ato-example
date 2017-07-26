<?php

//const DB_USER = 'root';
//const DB_PASS = '';
//const DB_NAME = 'inform_ato_web';
//const DB_HOST = 'localhost';

include_once 'config.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

unset($_SESSION['ussername']);
header('Location:http://ato-example/includes/signup.php');


