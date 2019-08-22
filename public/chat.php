
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
					console.log("Sleeping");
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








<?php

/*

		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				setInterval(function() {
					$('#chat').load('loadChat.php');
					console.log("Sleeping");
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
	
		<h1>Chat</h1>
		<div id='chat'>
		</div>
		
		<div id="send" style="display:none;"></div>
		<div id="user" style="display:none;"><?php echo $_SESSION['name']?></div>
		
		<div>
			<textarea id='text'></textarea>
		</div>	
		<button id='btn'>Send</button>


*/

?>










