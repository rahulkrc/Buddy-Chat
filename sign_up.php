<?php 
// Connects to your Database 

session_start();

$db_address = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'chatroom';

$_SESSION['connection'] = mysqli_connect($db_address, $db_user, $db_pass, $db_name);
 
mysqli_query($_SESSION['connection'],"INSERT INTO user_lists(user_id, username, password, user_online) VALUES('', '{$_GET['username']}', '{$_GET['password']}', '')"); //Insert username and password into database
?>