<html>
<head>
	<?php
		session_start();
	?>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon2.ico" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="js/registration-form-validation.js"></script>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<div id="reg_errors">
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
		</div>
		<div class="inputForms">
			<form action="register_handler.php" method="POST" name="registration">
				First Name: <input type="text" name="fname" value="<?php if(isset($_SESSION['presets']['fname'])){echo $_SESSION['presets']['fname'];}?>"><br>
				Last Name: <input type="text" name="lname" value="<?php if(isset($_SESSION['presets']['lname'])){echo $_SESSION['presets']['lname'];}?>"><br>
				E-mail: <input type="text" name="email" value="<?php if(isset($_SESSION['presets']['email'])){echo $_SESSION['presets']['email'];}?>"><br>
				Password: <input type="Password" name="password" id="password1"><br>
				Confirm Password: <input type="Password" name="passwordCheck"><br>
				<input type="submit" value="Register">
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
