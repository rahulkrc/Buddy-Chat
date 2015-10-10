<?php

require 'MYSQL.php';

$query = "SELECT `user_name`, `msg`, `time` from `msg_lists` where `user_id` like {$_GET['user_id']} and `recv_id` like {$_GET['recv_id']} OR `user_id` like {$_GET['recv_id']} and `recv_id` like {$_GET['user_id']}  ";
$result = mysqli_query($_SESSION['connection'], $query);
while ($row = mysqli_fetch_assoc($result)) {
	echo $row['user_name']. ":" .$row['time']." : " . $row['msg']. "<br />"; // Returns username, the time of message and the message
}
?>

