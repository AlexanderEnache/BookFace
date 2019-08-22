<?php include 'connection.php'; session_start()?>

<?php
	$user = $_POST['user'];
	$result = mysqli_query($connection, 
	'select * from chatlog where recipient = "'.$user.'" or author = "'.$user.'";');
	
	if($result){
		while($current = mysqli_fetch_assoc($result)){
			if($current['recipient'] == $user){					// Make this a class template
				echo "<li onclick='Clicked(".$current['chatid'].")'>".$current['author']."</li>";
			}else{
				echo "<li onclick='Clicked(".$current['chatid'].")'>".$current['recipient']."</li>";
			}
		}
	}else{
		echo '<li>You are not logged in</li>';
	}

?>

<script>

	function Clicked(chatid){
		console.log(chatid);
	}

</script>



















