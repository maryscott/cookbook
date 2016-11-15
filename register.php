<html>
<head>
	<?php
		session_start();
	?>
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
		<div id="reg_errors">
			<?php
				if (isset($_SESSION['message'])){
					$messages = $_SESSION['message'];
					foreach( $messages as $message){
						echo $message . "\n";
					}
				}
				unset($_SESSION['message']);
			?>
		</div>
		<div class="inputForms">
			<form action="register_handler.php" method="POST">
				First Name: <input type="text" name="fname" value="<?php if(isset($_SESSION['presets']['fname'])){echo $_SESSION['presets']['fname'];}?>"><br>
				Last Name: <input type="text" name="lname" value="<?php if(isset($_SESSION['presets']['lname'])){echo $_SESSION['presets']['lname'];}?>"><br>
				E-mail: <input type="text" name="email" value="<?php if(isset($_SESSION['presets']['email'])){echo $_SESSION['presets']['email'];}?>"><br>
				Password: <input type="Password" name="password"><br>
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
