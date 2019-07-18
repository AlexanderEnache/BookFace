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
				unset($_POST['submit']);
				exit();
			}
		}
		
		$result = mysqli_query($connection, "insert into userlog (name, username, password, crt_at) values ('" . $_POST['name'] . "'," . " '" . $_POST['username'] . "', " . "'". $_POST['password'] . "', " . (string)time() . "); ");
		
		$result = mysqli_query($connection, "create table ".$_POST['username']." (post varchar(5000), crt_at bigint );");
		
		//$result = mysqli_query($connection, "insert into ".$_POST['username']." (username) values ('".$_POST['name']."'); ");
		
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
		<link rel="stylesheet" type="text/css" href="style.css">
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

















