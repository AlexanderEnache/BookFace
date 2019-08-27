<?php include 'connection.php'; session_start();
	$result = mysqli_query($connection, 'select * from chat where chatid = '.$_POST['chatid']);
	while($current = mysqli_fetch_assoc($result)){
		if($current['author'] == $_SESSION['username']){
			echo '<p class="bubble-right">'.$current['text'].'</p>';
		}else{
			echo '<p class="bubble-left">'.$current['text'].'</p>';
		}
	}
?>