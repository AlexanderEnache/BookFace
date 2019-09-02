<?php include 'connection.php'; session_start();

	/* $user = $_POST['user'];
	
	$result = mysqli_query($connection, "insert into chatlog(author, recipient) values('".$_SESSION['username']."', '".$user."'); "); */

	$user = $_POST['user'];
	
	if($_SESSION['username'] != $user){
		$result = mysqli_query($connection, "CALL startChat('".$user."', '".$_SESSION['username']."');");
	}
	
/* 	DELIMITER $$
	CREATE PROCEDURE `startChat`(IN `user` VARCHAR(20), IN `this_user` VARCHAR(20))
	BEGIN
		IF ((SELECT COUNT(*) FROM chatlog WHERE recipient = user OR author = user) = 0) THEN 
		insert into chatlog(author, recipient) values(this_user, user); 
		END IF;
	END$$
	DELIMITER ; */
	
	/* 	DELIMITER $$
	CREATE PROCEDURE `startChat`(IN `user` VARCHAR(20), IN `this_user` VARCHAR(20))
	BEGIN
		IF (((SELECT COUNT(*) FROM chatlog WHERE recipient = user AND author = this_user) = 0) OR ((SELECT COUNT(*) FROM chatlog WHERE recipient = this_user AND author = user) = 0)) THEN 
		insert into chatlog(author, recipient) values(this_user, user); 
		END IF;
	END$$
	DELIMITER ; */
	
	
/* <script>
$(document).ready(function(){
	$('#open-chats').load('loadOpenChats.php');
});
</script> */

?>