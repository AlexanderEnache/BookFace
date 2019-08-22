<?php include 'connection.php'?>

<?php
	$result = mysqli_query($connection, 'select * from chat where chatid = 12');
	while($current = mysqli_fetch_assoc($result)){
		echo '<h3>'.$current['author'].'</h3>'.'<p>'.$current['text'].'</p>';
	}
?>