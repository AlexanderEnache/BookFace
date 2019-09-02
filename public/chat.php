<?php include 'connection.php';?><script src='jquery-3.4.1.js'></script>
	
	<script>
		$(document).ready(function(){
			
			let lock = false;

			setInterval(function() {
				$('#chat').load('loadChat.php', {
					chatid: $('#chatid').text()
				});
				if(lock){
					$('#chat').animate({scrollTop: $('#chat')[0].scrollHeight}, 1500);
					lock = false;
				}
			}, 1000);
			
			$('#btn').click(function(){
				if($('#chat-text').val()){
					$('#send').load('postChat.php', {
						text: $('#chat-text').val(),
						user: $('#user').text(),
						chatid: $('#chatid').text()
					});
					$('#chat-text').val("");
					lock = true;
				}
			});
		});
	</script>
	
	<div id="send" style="display:none;"></div>
	<div id="user" style="display:none;"><?php echo $_SESSION['name']?></div><?php
		echo '<div id="chatid" style="display:none;"><?php echo $_SESSION["name"]?>'.$_SESSION['chatid-current'].'</div>';
	?><div id='chat'>
	</div>
	
	<div class='chat-send'>
		<textarea id='chat-text'></textarea>	
		<button id='btn'>Send</button>
	</div>




