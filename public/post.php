<?php session_start(); ?>

<?php include 'connection.php' ?>
<?php include 'lib.php' ?>

<style>
<?php include 'style.css'?>
</style>

<?php

	if(!isset($_SESSION['username'])){
		echo '<h1>You are not logged in</h1>';
		header("Location: home.php");
	}

	if(isset($_POST['submit'])){
			
		if(!empty($_FILES['image']['name'])){
			
			$image = $_FILES['image']['name'];
			
			$result = mysqli_query($connection, "insert into image(image) values('$image');");
			
			$imgid = mysqli_insert_id($connection);
			
			$target = "images/".$imgid.".jpg";
			
			//$imgid = firstRow(mysqli_query($connection, "select * from image where id = '".$id."';"));
			//echo $imgid['image'];
			
			//echo '<p>'.$id.'</p>';
			
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				//echo '<h1>Wirked</h1>';
			}else{
				//echo '<h1>Didnt wirk</h1>';
			}
			
			$result = mysqli_query($connection, "insert into postlog (userid, text, imgid, crt_at) values (".$_SESSION['id'].", '".$_POST['post']."', ".$imgid.", '".(string)time()."'); ");

		}else{
		
			$result = mysqli_query($connection, "insert into postlog (userid, text, crt_at) values (".$_SESSION['id'].", '".$_POST['post']."', '".(string)time()."'); ");		
		
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
		<h1>Post</h1>
		<form action="post.php" method="POST" enctype="multipart/form-data">
			<textarea name="post" placeholder="Post here"></textarea>
			<input type="file" name="image"/>
			<input type="submit" name="submit"/>
		</form>
	</body>
</html>








