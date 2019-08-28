<?php include 'connection.php'; session_start();

	$user = $_POST['user'];
	
	$result = mysqli_query($connection, "insert into chatlog(chatid, author, recipient) values(15, '".$_SESSION['username']."', '".$user."'); ");

?>