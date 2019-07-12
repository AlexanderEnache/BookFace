<?php include 'connection.php'?>

<?php
	session_start();
	if(isset($_SESSION['end'])){
		session_destroy();
		session_start();
	}

	if(isset($_POST['submit'])){
		
		$result = mysqli_query($connection, 'select * from userlog');
		
		while($current = mysqli_fetch_assoc($result)){
			if($current['username'] == $_POST['username']){
				if($current['password'] == $_POST['password']){
					session_start();
					$_SESSION['username'] = $_POST['username'];
					$_SESSION['name'] = $current['name'];
				}
			}
		}
		
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
		<form action="login.php" method="post">
			<input type='text' placeholder='Username' name='username'/>
			<input type='password' placeholder='Password' name='password'/>
			<input class='button' type="submit" name="submit" value="Send">
		</form>
	</body>
</html>

















