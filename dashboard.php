<?php
	session_start();
	if (empty($_SESSION['logged_in'])){
		header("Location:login.php");
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<h4 id="dashleft">Frequently View Recipes</h4>
		<h4 id="dashright">Recipes you have not viewed in a while</h4>
		<div>
			
		</div>
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
