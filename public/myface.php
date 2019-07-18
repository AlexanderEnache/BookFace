<?php session_start(); ?>

<?php include 'connect.php'?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<?php include 'navbar.php';?>
		<h1>Home</h1>
		<?php
		
		if(isset($_SESSION['username'])){
		$result = mysqli_query($connection, "select * from ".$_SESSION['username'].";");
		$numOfPosts = 0;
			while($current = mysqli_fetch_assoc($result)){
				$numOfPosts++;
				echo "<p>".$current['post']."</p>";
				echo '<p>'.DateDiff($current['crt_at']).'</p>';
			}
			if(!$numOfPosts){
				echo "<p>You Have no posts yet</p>";
			}
		}else{
			echo "<p>You not logged in</p>";
		}
		?>
	</body>

</html>


<?php

	function DateDiff($epoch){//86400
		$diff = time() - $epoch;
		if($diff > 86400){
			return (new DateTime("@$diff"))->format('Y-m-d');
		}else{
			if($diff > 3600){
				return (new DateTime("@$diff"))->format('g')." hours ago";
			}else{
				return (new DateTime("@$diff"))->format('i')." minutes ago";
			}
		}
		//return time();
	}

?>











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













