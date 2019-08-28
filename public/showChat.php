<?php include 'connection.php'; session_start();
	$chatidList = $_SESSION['chatidList'];
	$userList   = $_SESSION['userList'];

	for($i = 0; $i < sizeof($chatidList); $i++){
		echo 
			"<div id ='chat-window-".$chatidList[$i]."' class='chat-window'>
				<div>
					<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$chatidList[$i]." || ".$userList[$i]."</p>
					<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'>X</button>";
		
	$_SESSION['chatid-current'] = $chatidList[$i];
	if(isset($_POST['chatid'])){
		if($chatidList[$i] == $_POST['chatid']){ echo "
					<button class='chat-window-button' onclick='minChat()'>_</button>
				</div>
				<div class='chat-window-open'>"; include 'chat.php'; echo '</div>';
		}else{
		echo	'</div>';
		}
	}else{
		echo "</div>";
	}
	echo "</div>";
}

?><script>
	function closeChat(id){
		$('#chat-box').load('closeChat.php', {
			chatid: id
		});
	}
	
	function openChatWindow(id){
		$('#chat-box').load('showChat.php', {
			chatid: id
		});
		$('#chat-window-'+id).css("height", "600px");
	}
	
	function minChat(){
		$('#chat-box').load('showChat.php');
	}
	
</script>









