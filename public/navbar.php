<?php include 'connection.php'?>

<style>
<?php include 'style.css'?>
</style>

<?php
	if(isset($_SESSION['username'])){
		$a = "loged in as ".$_SESSION['name'];
		$_SESSION['end'] = true;
		$href = "login.php";
		$signup = "";
		$myface = "<li><a href='myface.php' class='navlink'>my face</a></li>";
	}else{
		$a = "login";
		$href  = "login.php";
		$signup = "<li><a href='signup.php' class='navlink'>signup</a></li>";
		$myface = "";
	}
?>

<?php

	if(isset($_GET['search'])){
		session_start();
		$_SESSION['find'] = $_GET['find'];	
		Header('Location: search.php');
	}

?>

<html>
<div class = 'navbar'>
	<h1 class='logo'>AssFace</h1>
	
	<form action="navbar.php" method="get">
		<input type="search" name="find">
		<input type="submit" name="search">
	</form>
	
	<ul class="navlinks">
		<li><a href="home.php"   class="navlink">home</a></li>
		<li><a href="post.php"   class="navlink">post</a></li>
		<?php echo $signup;?>
		<?php echo $myface;?>
		<li><a href="login.php"  class="navlink"><?php echo $a;?></a></li>
	</ul>
	
</div>
</html>

