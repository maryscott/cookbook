<html>
<head>
	<?php
		session_start();
		if (empty($_SESSION['logged_in'])){
			header("Location:login.php");
		}
	?>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon2.ico" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<div class="inputForms">
			<form id="search">
				<input type="text" name="search" size="60"><br>
				<input type="submit" value="Search">
			</form>
		</div>
		
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
