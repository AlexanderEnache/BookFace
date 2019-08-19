<?php session_start(); ?>

<?php include 'connection.php'?>
<?php include 'lib.php'?>

<style>
<?php include 'style.css'?>
</style>

<?php
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
		header("Location: home.php");
	}

?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<?php include 'navbar.php'; ?>
		<h1>Log in</h1>
		<form action="login.php" method="post">
			<input type='text' placeholder='Username' name='username'/>
			<input type='password' placeholder='Password' name='password'/>
			<input class='button' type="submit" name="submit" value="Send">
		</form>
	</body>
</html>

















