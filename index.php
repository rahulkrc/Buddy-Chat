<?php
include ('MYSQL.php'); // Includes Login Script
$error = '';
if (isset($_SESSION['user_id'])) {
	header("location: profile.php");
} else if (isset($_POST['submit'])) {  // Variable To Store Error Message
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Please enter the fields";
	} else {                          // Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($_SESSION['connection'], $username);
		$password = mysqli_real_escape_string($_SESSION['connection'], $password);
		// SQL query to fetch information of registerd users and finds user match.
		$result = mysqli_query($_SESSION['connection'], "select * from `user_lists` where `password` = '{$password}' AND `username` = '{$username}'");
		$rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		if ($rows == 1) {
			if ($row['user_online'] == 1) {
				$error = "already logged in";
			} else {
				$_SESSION['user_id'] = $row['user_id'];  // Initializing Session
				$_SESSION['user_name'] = $row['username'];
				$result = mysqli_query($_SESSION['connection'], "update `user_lists` set `user_online` = 1 where `password` = '{$password}' AND `username` = '{$username}'");
				header("location: profile.php");   // Redirecting To Other Page
			}
		} else {

			$error = "Username or Password is invalid";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">
<h1>Buddy Chat!!!</h1>
<div id="login">
<h2>Login </h2>
<form action="index.php" method="post" name="login" id="log_in">
<label>UserName :</label>
<input id="name" name="username" type="text">
<label>Password :</label>
<input id="password" name="password" type="password">
<input name="submit" type="submit" value="Login ">
<input type="submit" onclick="signup()" value="Sign Up ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>

function signup(){
	username = document.getElementById("name").value;
	password = document.getElementById("password").value;
	
				$.ajax({
					url: "sign_up.php",
					method: "POST",
					data : {
						username : username,
						password : password,
					},
					success: function(data){
						document.getElementById("log_in").reset();		
					}
				});
}

</script>



</body>
</html>