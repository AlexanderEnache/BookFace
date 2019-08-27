<?php include 'connection.php';

	if(isset($_POST['submit'])){
		
		if($_POST['repassword'] !== $_POST['password']){
			echo 'incorrect password';
			unset($_POST['submit']);
			exit();
		}
		
		$result = mysqli_query($connection, 'select * from userlog');
		
		while($current = mysqli_fetch_assoc($result)){
			if($current['username'] == $_POST['username']){
				echo 'That username exists already';
				unset($_POST['submit']);
				exit();
			}
		}
		
		$result = mysqli_query($connection, "insert into userlog (name, username, password, crt_at) values ('" . $_POST['name'] . "'," . " '" . $_POST['username'] . "', " . "'". $_POST['password'] . "', " . (string)time() . "); ");
		
		$result = mysqli_query($connection, 'select id from userlog where username = "'.$_POST['username'].'";');
		
		while($cur = mysqli_fetch_assoc($result)){
			$id = $cur['id'];
		}
		
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['id'] = $id;
		
		unset($_POST);
		
		header("Location: index.php");
		
	}

?><!DOCTYPE html>
<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body><?php 
	include 'navbar.php'; 
	?><div class='blue-box'>
			<form action="signup.php" method="post">
				<h1>Sign Up</h1>
				<input class='form-input' type='text' placeholder='Full Name' name='name'/> <br><br>
				<input class='form-input' type='text' placeholder='Username' name='username'/> <br><br>
				<input class='form-input' type='password' placeholder='Password' name='password'/> <br><br>
				<input class='form-input' type='password' placeholder='Retype Password' name='repassword'/> <br><br>
				<input class='form-button' type="submit" name="submit" value="Send">
			</form>
		</div>
	</body>
</html>



