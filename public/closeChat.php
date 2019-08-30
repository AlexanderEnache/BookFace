<?php include 'connection.php'; session_start();

	if(($index = Find($_SESSION['chatidList'], $_POST['chatid']))>=0){
		array_splice($_SESSION['chatidList'], $index, 1);
		array_splice($_SESSION['userList'], $index, 1);
	}
	
	$chatidList = $_SESSION['chatidList'];
	$userList   = $_SESSION['userList'];

	function Find($chatidList, $entry){
		for($i = 0; $i < sizeof($chatidList); $i++){
			if($chatidList[$i] == $entry){
				return $i;
			}
		}
		return -1;
	}
	
?><script>
	//$(document).ready(function(){
		$('#chat-box').load('showChat.php');
		// console.log($(document).width());
		// console.log($(document).height());
	//});
</script>









