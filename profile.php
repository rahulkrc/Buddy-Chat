<?php
include ('MYSQL.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<div>
		<div id="profile">
			<b id="Welcome">Welcome : <i><?php echo $_SESSION['user_name']; ?></i></b>
			<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
		<b>
		<div id="frinbox">
			
		</div>
		</b>
		<div id="chatbox">
			
		</div>
		
		<div id="chatForm" >
			<form action="" method="POST">
				<input type="text" id="sendMsg" style="width: 90%"/>
				<input type="button" id="sendMsgButton" value="Send" />
			</form>
		</div>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script>
	    var recv_id = 0;  
	       $(document).ready(function() {                              //Friend box where all the friends in group appear
			    $('#frinbox').bind('click', function(event) {
			        recv_id = $(event.target).attr('id');
  				   
 			});
			load_chat_interval = setInterval(load_chat, 2500);        // Chat box where the messages are displayed
			function load_chat(){
				user_id = <?php echo $_SESSION['user_id']?>;
				$.ajax({
					url: "load_chat.php",
					method: "GET",
					data : {
						user_id : user_id,
						recv_id : recv_id,
					},
					success: function(data){
						console.log(data);
						$("#chatbox").html(data);		
					}
				});
			}
			$('#sendMsgButton').click(function(){    // Setting up the message send button
				send_msg = $('#sendMsg').val();
				user_name = '<?php echo $_SESSION['user_name']; ?>';
				user_id = <?php echo $_SESSION['user_id'] ?>;
					$.ajax({
						url : "send_msg.php",
						method : "POST",
						data : {
							send_msg : send_msg,
							user_id : user_id,
							recv_id : recv_id,
							user_name : user_name
						},
						success : function(data) {
							console.log(data);
							if (data == 'success') {
								$('#sendMsg').val('');
							} else if (data == 'no msg') {
								alert("Please enter a msg to send")
							} else {
								alert("msg sending error please try again");
							}
						}
					});
					});
					loadfrins_interal = setInterval(loadfrins, 2500);    // Available friends are displayed
					function loadfrins() {
						$.ajax({
							url : "loadfrins.php",
							method : "GET",
							data : {
								user_id : user_id,
							},
							success : function(data) {
								console.log(data);
								$("#frinbox").html(data);

							}
						});

					}

					});
	</script>
</body>
</html>