<?php session_start(); ?>

<style>
<?php include 'style.css'?>
</style>

<?php include 'connection.php'?>
<?php include 'userObj.php'?>

<?php

	if($_SESSION['find']){
		$result = mysqli_query($connection, "select * from userlog where name='".$_SESSION['find']."'; ");
		unset($_SESSION['find']);
	}else{
		Header('Location: home.php');
	}

?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
	<?php include 'navbar.php';?>
		<h1>Search</h1>
		<?php
			$num = 0;
			while($current = mysqli_fetch_assoc($result)){
				$num++;
				(new user($current['username'], $current['name'], $current['id']))->toString();
			}
			if(!$num){
				echo "<h2>No results found</h2>"; 
			}
		?>
	</body>

</html>












