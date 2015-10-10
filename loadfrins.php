<?php

require 'MYSQL.php';

$query = "SELECT `username` , `user_id` from `user_lists`";
$result = mysqli_query($_SESSION['connection'], $query);
while ($row = mysqli_fetch_assoc($result)) {
	echo "<div id='".$row['user_id']. "'>".$row['username']. "</div>"; //returns username in the div i.e frinbox 
}

?>
