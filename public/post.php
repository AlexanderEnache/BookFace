<?php session_start(); ?>

<?php include 'connection.php' ?>

<?php

	if(!isset($_SESSION['username'])){
		echo '<h1>You are not logged in</h1>';
		//sleep(10);
		//header("Location: home.php");
	}

	if(isset($_POST['submit'])){
		echo $_SESSION['username'];
		$result = mysqli_query($connection, "insert into ".$_SESSION['username']." (post, crt_at) values ('".$_POST['post']."', '".(string)time()."'); ");
	}
	
	// <input type="textarea" name="post" placeholder="Post here">

?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<?php include 'navbar.php';?>
		<h1>Post</h1>
		<form action="post.php" method="POST">
			<textarea name="post" placeholder="Post here"></textarea>
			<input type="submit" name="submit">
		</form>
	</body>
</html>








