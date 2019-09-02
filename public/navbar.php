<?php include 'connection.php';
	if(isset($_SESSION['username'])){
		$a = "loged in as ".$_SESSION['name'];
			$_SESSION['end'] = true;
		$href = "login.php";
		$signup = "";
		$myface = "<li class='navlink'><a href='myface.php' class='no-decoration'>my face</a></li>";
		$chats = 
		"<li id='chat-hover' class='navlink'>
			<a href='#' id='chats' class='no-decoration'>chats</a>
			<ul id='open-chats' style='display:none;' class='dropdown'>
				
			</ul>
		</li>
			
			";
			
	}else{
		$a = "login";
		$href  = "login.php";
		$signup = "<li class='navlink'><a href='signup.php' class='no-decoration'>signup</a></li>";
		$myface = "";
		$chats = "";
	}

	if(isset($_GET['search'])){
		session_start();
		$_SESSION['find'] = $_GET['find'];	
		Header('Location: search.php');
	}

?><!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='jquery-3.4.1.js'></script>
	<script src="https://kit.fontawesome.com/6734dedc8e.js"></script>
	<script>
		$(document).ready(function(){
			$('#chat-hover').mouseover(function(){
				$('#open-chats').css('display', 'block');
				// $('#open-chats').load('loadOpenChats.php');
			});
			$('#chat-hover').mouseout(function(){
				$('#open-chats').css('display', 'none');
			});
			$('#open-chats').load('loadOpenChats.php', {
				user: $('#user').text()
			});
			$('#chat-box').load('showChat.php');
			chatOpen = sessionStorage.getItem("chatOpen");
			console.log(chatOpen);
			if(chatOpen != null) {
				$('#chat-box').load('showChat.php', {
					chatid: chatOpen
				});
			}
		});
	</script>
<style type="text/css"><?php include 'style-mobile.css'?></style>
</head>

<body>
	<div class = 'navbar'>
		<ul class="navlinks">
			<li class='logo'><h1>AssFace</h1></li>
			<li class='navlink search-user-li'>
				<form class='search-user-form' action="navbar.php" method="get" class="findFriend">
					<input class='search-user-bar' type="search" name="find">
					<button class='search-user-button' type="submit" name="search"><i class="fas fa-search"></i></button>
				</form>
			</li>
			<li class='navlink'><a href="index.php" class='no-decoration'>home</a></li>
			<li class='navlink'><a href="post.php" class='no-decoration'>post</a></li><?php
			echo $signup;
			echo $myface;
			echo $chats;
			?><li class='navlink'><a href="login.php" class='no-decoration'><?php echo $a;?></a></li>
		</ul>
		
	</div><?php
		if(isset($_SESSION['username'])){
			echo "<p id='user' style='display:none;'>".$_SESSION['username']."</p>";
		}
	?></body>

</html>





