<?php session_start();include 'connection.php';include 'lib.php';
	if(isset($_SESSION['end'])){
		session_destroy();
		session_start();
	}

	if(isset($_POST['submit'])){
		$result = mysqli_query($connection, "select * from userlog where username = '".$_POST['username']."';");
		
		if(mysqli_num_rows($result)){
			$user = firstRow($result);
			if($user['password'] == $_POST['password']){
				$_SESSION['username'] = $user['username'];
				$_SESSION['name'] = $user['name'];
				$_SESSION['id'] = $user['id'];
			}else{
				echo '<h3>Wrong password</h3>';
			}
		}else{
			echo '<h3>Wrong username</h3>';
		}
		unset($_POST);
		header("Location: index.php");
	}

?><!DOCTYPE html>
<html>

	<head>
		<title>PageFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body style='background-color:white'><?php
	include 'navbar.php'; 
	?><div class='blue-box'>
			<form action="login.php" method="post">
				<h1>Log in</h1>
				<input class='form-input' type='text' placeholder='Username' name='username'/> <br><br>
				<input class='form-input' type='password' placeholder='Password' name='password'/> <br><br>
				<input class='form-button' type="submit" name="submit" value="Send"> <br><br>
				<a class='form-link' href='signup.php'>Create account</a>
			</form></div><?php include 'chatbar.php';
	?></body>
</html>




