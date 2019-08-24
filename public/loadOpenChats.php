<?php include 'connection.php'; session_start()?>

<?php
	$user = $_POST['user'];
	$result = mysqli_query($connection, 
	'select * from chatlog where recipient = "'.$user.'" or author = "'.$user.'";');
	
	if($result){
		for($i = 0; $current = mysqli_fetch_assoc($result); $i++){
			$j = $current['chatid'];
			if($current['recipient'] == $user){			// Make this a class template
				$k = $current['author'];
			}else{
				$k = $current['recipient'];
			}
			echo '<li onclick="Clicked('.$j.', '."'".$k."'".')">'.$k.'</li>';
			$chatidList[$i] = $j;
			$chatidUser[$i] = $k;
		}
	}else{
		echo '<li>You are not logged in</li>';
	}

?>

<script>

	function Clicked(chatid, user){
		$('#chat-box').load('chatOpen.php', {
			chatid: chatid,
			user: user
		});
	}

</script>









