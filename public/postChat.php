<?php include 'connection.php'?>

<?php
	$text = $_POST['text'];
	$user = $_POST['user'];
	$chatid = $_POST['chatid'];

	$result = mysqli_query($connection, 'INSERT INTO chat(chatid, author, text) VALUES ("'.$chatid.'", "'.$user.'", "'.$text.'");');
	
	//mysqli_insert_id($connection);
	//IDENT_CURRENT() 
?>