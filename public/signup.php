<?php include 'connection.php'?>

<?php 

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
				isset($_POST['submit']);
				exit();
			}
		}
		
		$result = mysqli_query($connection, "insert into userlog (name, username, password, crt_at) values ('" . $_POST['name'] . "'," . " '" . $_POST['username'] . "', " . "'". $_POST['password'] . "', " . (string)time() . "); ");
		
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['name'] = $_POST['name'];
		
		unset($_POST);
		
		header("Location: home.php");
		
	}

?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	
	<body>
	<?php include 'navbar.php'; ?>
		<h1>Sign Up</h1>
		<form action="signup.php" method="post">
			<input type='text' placeholder='Full Name' name='name'/>
			<input type='text' placeholder='Username' name='username'/>
			<input type='password' placeholder='Password' name='password'/>
			<input type='password' placeholder='Retype Password' name='repassword'/>
			<input class='button' type="submit" name="submit" value="Send">
		</form>
	</body>
</html>

















