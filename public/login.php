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
		//header("Location: index.php");
	}

?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<?php include 'navbar.php'; ?>
	
		<div class='blue-box'>
			<form class='form' action="login.php" method="post">
				<h1>Log in</h1>
				<input class='form-input' type='text' placeholder='Username' name='username'/> <br><br>
				<input class='form-input' type='password' placeholder='Password' name='password'/> <br><br>
				<input class='form-button' type="submit" name="submit" value="Send"> <br><br>
				<a class='form-link' href='signup.php'>Create account</a>
			</form>
		</div>
	</body>
</html>

















