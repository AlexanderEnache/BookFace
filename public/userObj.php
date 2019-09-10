<?php

	class user{
		
		private $username;
		private $name;
		private $id;
		
		public function __construct($username, $name, $id){
			$this->username = $username;
			$this->name = $name;
			$this->id = $id;
		}
		
		public function toString(){
			echo "<div class='post'>
					<h3>
						<a href='page.php?id=".$this->id."'>".$this->name."</a>
					</h3>
					<button class='start-chat' onclick='startChat(".'"'.$this->username.'"'.")'><i class='far fa-comment'></i></button>
				</div>";
		}
	
		public function open(){
			header('Location: index.php');
		}
	
	}

?><p id="garbage" style='display:none;'></p>
<script>


function startChat(user){
	$('#garbage').load('startChat.php', {
		user: user
	});
	
	// $('#chat-box').load('showChat.php');				// Make thing to open chat that was just clikced on
	// $('#open-chats').load('loadOpenChats.php');
}


</script>


