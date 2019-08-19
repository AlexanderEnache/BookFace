<?php session_start(); ?>

<?php include 'connection.php'?>

<style>
<?php include 'style.css'?>
</style>

<?php

	if(isset($_POST['submit'])){
		
		$target = "images/".basename($_FILES['image']['name']);
		
		$image = $_FILES['image']['name'];
		
		$query = mysqli_query($connection, "insert into image(image) values('$image')");
		
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			echo '<h1>Wirked</h1>';
		}else{
			echo '<h1>Didnt wirk</h1>';
		}
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
	<?php include 'navbar.php';?>
		<h1>Home</h1>
		<form method="post" action="pic.php" enctype="multipart/form-data">
			<input type="file" name="image"/>
			<input type="submit" name="submit"/>
		</form>
	</body>

</html>















