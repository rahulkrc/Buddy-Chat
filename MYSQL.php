<?php

session_start();

$db_address = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'chatroom';

$_SESSION['connection'] = mysqli_connect($db_address, $db_user, $db_pass, $db_name);


?>