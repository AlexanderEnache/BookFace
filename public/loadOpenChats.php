<?php include 'connection.php'; session_start();
	//$user = $_POST['user'];
	// echo '<li>You are not logged '.$user.'</li>';
	$result = mysqli_query($connection, 'select * from chatlog where recipient = "'.$_SESSION['username'].'" or author = "'.$_SESSION['username'].'";');
	
	if($result){
		for($i = 0; $current = mysqli_fetch_assoc($result); $i++){
			$j = $current['chatid'];
			if($current['recipient'] == $_SESSION['username']){			// Make this a class template
				$k = $current['author'];
			}else{
				$k = $current['recipient'];
			}
			echo '<li class="chat-dropdown-li"  onclick="Clicked('.$j.', '."'".$k."'".')">'.$k.'</li>';
			$chatidList[$i] = $j;
			$chatidUser[$i] = $k;
		}
	}else{
		echo '<li>You are not logged in</li>';
	}

?><script>

console.log("just loaded nav");

	function Clicked(chatid, user){
		$('#chat-box').load('chatOpen.php', {
			chatid: chatid,
			user: user
		});
	}

</script>









