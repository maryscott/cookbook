<?php
	session_start();
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
		<?php
			if (isset($_SESSION["message"])) {
				unset($_SESSION["message"]);
				echo'<div> hello </div>';
				
			}
		?>
	
		<div class="inputForms">
			<form action="login_handler.php" method="POST">
				E-mail: <input type="text" name="email"><br>
				Password: <input type="Password" name="password"><br>
				<input type="submit" value="login">
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
