<?php session_start(); include 'connection.php'; include 'lib.php';

	if(!isset($_SESSION['username'])){
		echo '<h1>You are not logged in</h1>';
		header("Location: index.php");
	}

	if(isset($_POST['submit'])){
			
		if(!empty($_FILES['image']['name'])){
			
			$image = $_FILES['image']['name'];
			
			$result = mysqli_query($connection, "insert into image(image) values('$image');");
			
			$imgid = mysqli_insert_id($connection);
			
			$target = "images/".$imgid.".jpg";
			
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

?><!DOCTYPE html>
<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style><?php include 'style-mobile.css'?></style>
	</head>
	
	<body><?php include 'navbar.php';
	?><div class='blue-box'>
			<form class='post-form' action="post.php" method="POST" enctype="multipart/form-data">
				<h1>Post</h1>
				<textarea cols="55" wrap="soft" class='post-form-input' name="post" placeholder="Post here"></textarea><br>
				<input class='form-input' type="file" name="image"/><br><br>
				<input class='form-button post-form-button' type="submit" name="submit"/>
			</form>
		</div>
	</body>
</html>








