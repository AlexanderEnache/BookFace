<?php include 'connection.php'; session_start();

if(isset($_SESSION['chatidList']) && isset($_SESSION['userList'])){
	$chatidList = $_SESSION['chatidList'];
	$userList   = $_SESSION['userList'];

	for($i = 0; $i < sizeof($chatidList); $i++){
		$_SESSION['chatid-current'] = $chatidList[$i];
		if(isset($_POST['chatid'])){
			if($chatidList[$i] == $_POST['chatid']){
				echo "<div id ='chat-window-wide' class='chat-window'>
						<div class='chat-window-bar'>
							<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$userList[$i]."</p>
							<div class='chat-window-buttons'>
								<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'><i class='fas fa-times'></i></button>
								<button class='chat-window-button' onclick='minChat()'><i class='fas fa-window-minimize'></i></button>
							</div>
						</div>
						<div class='chat-window-open'>"; include 'chat.php'; echo '</div>';
					echo "</div>";
			}else{
				echo "<div id ='chat-window-".$chatidList[$i]."' class='chat-window'>
						<div class='chat-window-bar'>
							<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$userList[$i]."</p>
							<div class='chat-window-buttons'>
								<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'><i class='fas fa-times'></i></button>
							</div>
						</div>
					</div>";
			}
		}else{
			echo "<div id ='chat-window-".$chatidList[$i]."' class='chat-window'>
					<div class='chat-window-bar'>
						<p class='chat-window-item' onclick='openChatWindow(".$chatidList[$i].")'>".$userList[$i]."</p>
						<div class='chat-window-buttons'>
							<button class='chat-window-button' onclick='closeChat(".$chatidList[$i].")'><i class='fas fa-times'></i></button>
						</div>
					</div>
				</div>";
		}
	}

}

?><script>
		
	chatOpen = sessionStorage.getItem("chatOpen");
		
	if(chatOpen != null) {
		console.log("Session set " + chatOpen);
		if($(document).width()<=699){
			$('#chat-box').css("height", "100%");	
			$('#chat-box').css("width", "100%");
			$("#chat").css("flex-grow", "1");
		}
	}else{
			console.log("Session NOT set");
			$('#chat-box').css("height", "");	
			$('#chat-box').css("width", "300px");	
	}

	function closeChat(id){
		if(id == chatOpen){
			sessionStorage.removeItem("chatOpen");
		}
		$('#chat-box').load('closeChat.php', {
			chatid: id
		});
	}
	
	function openChatWindow(id){
		sessionStorage.setItem("chatOpen", id);
		$('#chat-box').load('showChat.php', {
			chatid: id
		});
	}
	
	function minChat(){
		sessionStorage.removeItem("chatOpen");		
		$('#chat-box').load('showChat.php');
	}
	
</script>









