<?php
require 'MYSQL.php';
$user_id = $_SESSION['user_id'];
$result = mysqli_query($_SESSION['connection'], "UPDATE `chatroom`.`user_lists` SET `user_online` = '0' WHERE `user_lists`.`user_id` = '{$user_id}'");

if(session_destroy()) // Destroy all SESSIONS
{
     header("Location: index.php"); //Redirecting to home page
}
?>