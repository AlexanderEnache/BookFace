<?php include 'connection.php'; session_start()?>

<?php
	
	if(!isset($_SESSION['chatidList'])){
		$_SESSION['chatidList'] = array();
		$_SESSION['userList'] = array();
	}
	
	if(isAlready($_SESSION['chatidList'], $_POST['chatid'])){
		array_push($_SESSION['chatidList'], $_POST['chatid']);
		array_push($_SESSION['userList'], $_POST['user']);
	}

	function isAlready($chatidList, $entry){
		for($i = 0; $i < sizeof($chatidList); $i++){
			if($chatidList[$i] == $entry){
				return false;
			}
		}
		return true;
	}
	
?>

<script>
	//$(document).ready(function(){
		$('#chat-box').load('showChat.php');
	//});
</script>





