<?php session_start(); ?>

<?php include 'connection.php'?>
<?php include 'postObj.php'?>

<style>
<?php include 'style.css'?>
</style>

<?php
	if(!isset($_SESSION['username'])){
		//header("Location: login.php");
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
		<h1>Home</h1>
		<?php
			if(isset($_SESSION['username'])){
				$result = mysqli_query($connection, "select * from postlog where userid = ".$_SESSION['id'].";");
				if(mysqli_num_rows($result)){
					while($current = mysqli_fetch_assoc($result)){
						(new post($current['text'], $current['crt_at'], $current['id']))->listItem();
					}
				}else{
					echo "<p>You have no posts yet</p>";
				}
			}else{
				echo "<p>You not logged in</p>";
			}
		?>
		
		<?php include 'chatbar.php';?>
		
	</body>
</html>



<?php
/*if(isset($_POST['submit'])){
		
		$target = "images/" . $_FILES['image']['name'];
		
		$image = $_FILES['image']['name'];
		
		if(move_uploaded_file($_FILES['image']['name'], $target)){
			echo '<p>HEellfrpf</p>';
		}else{
			echo '<p>Not ok</p>';
		}
		
		$result = mysqli_query($conn, "insert into images(img) values('$image');");
		
		/*
		
		$result = mysqli_query($conn, "select * from images;");
		
		while($row = mysqli_fetch_array($result)){
			//echo $row['img'];
			echo "<img src='images/".$row['img']."'>";
			//echo $row['img'];
			//echo "<img src='https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_175/f_auto,q_auto,w_1100/v1554921998/shape/mentalfloss/549585-istock-909106260.jpg'>";
		}
		
		//echo 'HERE';
	}

	unset($_POST);
	
	/*<?php if(isset($_SESSION['username'])){ echo '<h2>Welcome ' . $_SESSION['name'] . '</h2>'; } ?>
		
	<form action="home.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" name="submit">
	</form>*/
?>













