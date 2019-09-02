<?php include 'connection.php'; session_start(); include 'lib.php';

$result = mysqli_query($connection, 'select count(*) from chat where chatid = '.$_POST['chatid'].';');
$count = firstRow($result)['count(*)'];
	
	if(isset($_SESSION['chatCount'])){
		if(firstRow($result)['count(*)'] != $_SESSION['chatCount']){
			printChat($connection);
			$_SESSION['chatCount'] = $count;
		}
	}else{
		printChat($connection);
		$_SESSION['chatCount'] = $count;
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
?>