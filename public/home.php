<?php session_start(); ?>

<html>

	<head>
		<title>AssFace</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<?php include 'navbar.php'; ?>
		<h1>Home</h1>
		<?php if(isset($_SESSION['username'])){ echo '<h2>Welcome ' . $_SESSION['name'] . '</h2>'; } ?>
	</body>

</html>

