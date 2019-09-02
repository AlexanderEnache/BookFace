<?php include 'connection.php'; session_start(); include 'lib.php';

$result = mysqli_query($connection, 'select count(*) from chat where chatid = '.$_POST['chatid'].';');
$count = firstRow($result)['count(*)'];
	
	if(isset($_SESSION['chatCount'])){
		if($count != $_SESSION['chatCount']){
			$_SESSION['chatCount'] = $count;
			echo "<p id='trash-garbage' style='display:none;'>New</p>";
			printChat($connection);
		}else{
			echo "<p id='trash-garbage' style='display:none;'>Old</p>";
			printChat($connection);
		}
	}else{
		$_SESSION['chatCount'] = $count;
		echo "<p id='trash-garbage' style='display:none;'>New</p>";
		printChat($connection);
	}
	
	function printChat($connection){
		$result = mysqli_query($connection, 'select * from chat where chatid = '.$_POST['chatid'].';');
		while($current = mysqli_fetch_assoc($result)){
			if($current['author'] == $_SESSION['username']){
				echo '<p class="bubble-right">'.$current['text'].'</p>';
			}else{
				echo '<p class="bubble-left">'.$current['text'].'</p>';
			}
		}
	}
?><script>
	/* if($('#trash-garbage').innerText){
		setInterval(function() {
			$('#chat').animate({scrollTop: $('#chat')[0].scrollHeight}, 1500);
		}, 1000);
	} */
	
	$(document).ready(function(){
		if($('#trash-garbage').text() == "New"){
			$('#chat').animate({scrollTop: $('#chat')[0].scrollHeight}, 1500);
		}
	});
	
	
</script>














