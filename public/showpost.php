<?php session_start(); ?>

<?php include 'connection.php'?>
<?php include 'postObj.php'?>

<style>
<?php include 'style.css'?>
</style>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
	<?php include 'navbar.php';?>
		<?php
			$result = mysqli_query($connection, "select * from postlog where id = ".$_GET['id'].";");
			$post = firstRow($result);
			if($post){
				(new post($connection, $post['text'], $post['crt_at'], $post['id'], $post['imgid']))->showPost();
			}else{
				header("Location: index.php");
			}
		?>
	</body>

</html>










