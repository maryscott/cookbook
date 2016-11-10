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
		<div class="inputForms">
			<form>
				First Name: <input type="text" name="fname"><br>
				Last Name: <input type="text" name="lname"><br>
				E-mail: <input type="text" name="email"><br>
				Password: <input type="Password" name="password"><br>
				Confirm Password: <input type="Password" name="passwordCheck"><br>
				<input type="button" value="Register">
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
