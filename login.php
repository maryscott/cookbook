<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<div class="inputForms">
			<form>
				Username: <input type="text" name="username"><br>
				Password: <input type="Password" name="fname"><br>
				<input type="button" value="login">
			</form>
			<form action="register.php" id="register">
				<input type="submit" value="Register" />
			</form>
			<a href="register.php">Forgot Password?</a>
		</div>
	
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
