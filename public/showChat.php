
<?php include 'connection.php'; session_start()?>

<?php
	$chatidList = $_SESSION['chatidList'];
	$userList   = $_SESSION['userList'];
	
	for($i = 0; $i < sizeof($chatidList); $i++){
		echo "	<div class='chat-window'>
				<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$chatidList[$i]." || ".$userList[$i]."</p>
				<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'>X</button>";
		$_SESSION['chatid-current'] = $chatidList[$i];
			if(isset($_POST['chatid']))
				{if($chatidList[$i] == $_POST['chatid']){ echo "
						<button class='chat-window-button' onclick='minChat()'>_</button>
						<div class='chat-window-open'>"; include 'chat.php'; echo '</div>';}}
		echo		"</div>";
	}
?>

<script>
	function closeChat(id){
		$('#chat-box').load('closeChat.php', {
			chatid: id
		});
	}
	
	function openChatWindow(id){
		$('#chat-box').load('showChat.php', {
			chatid: id
		});
	}
	
	function minChat(){
		$('#chat-box').load('showChat.php');
	}
	
	/* function openChatWindow(id){
		$('#chat-box').load('openChatWindow.php', {
			chatid: id
		});
	} */
</script>