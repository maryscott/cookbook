<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon2.ico" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="js/logIn-validation.js"></script>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<?php
			if (isset($_SESSION['message'])) {
				$messages = $_SESSION['message'];
					echo "<div id=\"logInErrors\">";
					foreach( $messages as $message){
						echo $message . "<br>";
					}
					echo "</div>";
				unset($_SESSION['message']);
			}
		?>
	
		<div class="inputForms">
			<form action="login_handler.php" method="POST" name="logInForm">
				E-mail: <input type="text" name="email" value="<?php if(isset($_SESSION['presets']['email'])){echo $_SESSION['presets']['email'];}?>"><br>
				Password: <input type="Password" name="password"><br>
				<input type="submit" value="login">
			</form>
			<form action="register.php" id="register">
				<input type="submit" value="Register" />
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
