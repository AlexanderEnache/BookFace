
<?php include 'connection.php';?>

	<script src='jquery-3.4.1.js'></script>
	
	<script>
		$(document).ready(function(){
			
			let lock = false;
			//$('#chat').animate({scrollTop: $('#chat')[0].scrollHeight}, 1500);
			
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
				$('#send').load('postChat.php', {
					text: $('#chat-text').val(),
					user: $('#user').text(),
					chatid: $('#chatid').text()
				});
				$('#chat-text').val("");
				lock = true;
			});
		});
	</script>

	<div id='chat'>
	</div>
	
	<div id="send" style="display:none;"></div>
	<div id="user" style="display:none;"><?php echo $_SESSION['name']?></div>
	<?php
		echo '<div id="chatid" style="display:none;"><?php echo $_SESSION["name"]?>'.$_SESSION['chatid-current'].'</div>';
	?>
	
	<div>
		<textarea id='chat-text'></textarea>
	</div>	
	<button id='btn'>Send</button>








<?php

/*

	
<?php include 'connection.php';?>

<html>
	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src='jquery-3.4.1.js'></script>
		
		<script>
			$(document).ready(function(){
				setInterval(function() {
					$('#chat').load('loadChat.php');
					// console.log("Sleeping");
				}, 1000);
				
				$('#btn').click(function(){
					$('#send').load('postChat.php', {
						text: $('#text').val(),
						user: $('#user').text(),
						chatid: "12"
					});
					$('#text').val("");
				});
				
			});
		</script>

		
	</head>
	
	<body>
		<h1>Chat</h1>
		<div id='chat'>
		</div>
		
		<div id="send" style="display:none;"></div>
		<div id="user" style="display:none;"><?php echo $_SESSION['name']?></div>
		
		<div>
			<textarea id='text'></textarea>
		</div>	
		<button id='btn'>Send</button>
	</body>
</html>	

*/

?>










