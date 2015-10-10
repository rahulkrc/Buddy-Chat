<?php
require 'MYSQL.php';

if(!empty($_GET['user_id']) && !empty($_GET['recv_id']) && !empty($_GET['user_name']) && !empty($_GET['send_msg'])){
	$time = time();
	$query = "INSERT INTO `msg_lists`(`msg_id`, `user_id`, `user_name`, `recv_id`, `msg`, `time`) VALUES (null,{$_GET['user_id']},'{$_GET['user_name']}',{$_GET['recv_id']},'{$_GET['send_msg']}',now())"; // Inserting message into message box
	$result = mysqli_query($_SESSION['connection'], $query);
	if(!$result){
		echo "error" . mysqli_error($_SESSION['connection']);
	}
	else{
		echo "success";	
	}
}
else if(empty($_GET['send_msg'])){
	echo "no msg";
}
else{
	echo error;
	
}