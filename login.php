<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<?php
			if (isset($_SESSION['message'])) {
				$messages = $_SESSION['message'];
					echo "<div>";
					foreach( $messages as $message){
						echo $message . "<br>";
					}
					echo "</div>";
				unset($_SESSION['message']);
			}
		?>
	
		<div class="inputForms">
			<form action="login_handler.php" method="POST">
				E-mail: <input type="text" name="email" value="<?php if(isset($_SESSION['presets']['email'])){echo $_SESSION['presets']['email'];}?>"><br>
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
