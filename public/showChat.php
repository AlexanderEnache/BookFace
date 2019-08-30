<?php include 'connection.php'; session_start();
	$chatidList = $_SESSION['chatidList'];
	$userList   = $_SESSION['userList'];

for($i = 0; $i < sizeof($chatidList); $i++){
	$_SESSION['chatid-current'] = $chatidList[$i];
	if(isset($_POST['chatid'])){
		if($chatidList[$i] == $_POST['chatid']){
			echo "<div id ='chat-window-wide' class='chat-window'>
					<div class='chat-window-bar'>
						<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$chatidList[$i]." || ".$userList[$i]."</p>
						<div class='chat-window-buttons'>
							<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'>X</button>
							<button class='chat-window-button' onclick='minChat()'>_</button>
						</div>
					</div>
					<div class='chat-window-open'>"; include 'chat.php'; echo '</div>';
				echo "</div>";
		}else{
			echo "<div id ='chat-window-".$chatidList[$i]."' class='chat-window'>
					<div class='chat-window-bar'>
						<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$chatidList[$i]." || ".$userList[$i]."</p>
						<div class='chat-window-buttons'>
							<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'>X</button>
						</div>
					</div>
				</div>";
		}
	}else{
		echo "<div id ='chat-window-".$chatidList[$i]."' class='chat-window'>
				<div class='chat-window-bar'>
					<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$chatidList[$i]." || ".$userList[$i]."</p>
					<div class='chat-window-buttons'>
						<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'>X</button>
					</div>
				</div>
			</div>";
	}
}

?><script>

		if($(document).width()<=699){
			$('#chat-box').css("height", "100%");	
			$('#chat-box').css("width", "100%");	

			$(".chat-window-bar").css("width", "100%");
			
			$("#chat").css("flex-grow", "1");
			
			console.log("SMALLER");
		}else{
			console.log("BIGGER");
		}

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
		$('#chat-box').css("height", "");	
		$('#chat-box').css("width", "");	

		$(".chat-window-bar").css("width", "");
			
		$("#chat").css("flex-grow", "");
		
		$('#chat-box').load('showChat.php');
	}
	
</script>









