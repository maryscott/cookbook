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
		<div>
			<p>
			Username: <!-- getting username from somewhere will happen here --> <br>
			</p>
			
			<pre><form>
			Change Password:
				old Password:<input type="password" name="oldpass" size="60"><br>
				new Password:<input type="password" name="newpass" size="60"><br>
				confirm Password:<input type="password" name="newpass" size="60"><br>
			</pre></form>
			
			<p>
			Total Number of Recipes: <!-- getting number of recipes from database will happen here --> <br>
			</p>
		</div>
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
