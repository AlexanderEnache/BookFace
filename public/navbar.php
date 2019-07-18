<?php
	if(isset($_SESSION['username'])){
		$a = "loged in as ".$_SESSION['name'];
		$_SESSION['end'] = true;
		$href = "login.php";
		$signup = "";
		$mypage = "<li><a href='mypage.php' class='navlink'>my page</a></li>";
	}else{
		$a = "login";
		$href  = "login.php";
		$signup = "<li><a href='signup.php' class='navlink'>signup</a></li>";
		$mypage = "";
	}
?>

<html>
<div class = 'navbar'>
	<h1 class='logo'>AssFace</h1>
	
	<ul class="navlinks">
		<li><a href="home.php"   class="navlink">home</a></li>
		<li><a href="post.php"   class="navlink">post</a></li>
		<?php echo $signup;?>
		<?php echo $mypage;?>
		<li><a href="login.php"  class="navlink"><?php echo $a;?></a></li>
	</ul>
	
</div>
</html>

