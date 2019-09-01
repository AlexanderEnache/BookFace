<?php include 'connection.php'; session_start();

	$user = $_POST['user'];
	
	$result = mysqli_query($connection, "insert into chatlog(author, recipient) values('".$_SESSION['username']."', '".$user."'); ");

?>