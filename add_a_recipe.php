<html>
<head>
	<?php
		session_start();
		if (empty($_SESSION['logged_in'])){
			header("Location:login.php");
		}
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
		<h3>Add a Recipe:</h3>
		<form action="action_add_recipe.php" method="POST">
		<div class="inputForms">
			
			<p><input type="radio" name="recipeType" value='1' checked> Website</p>
				<span>
					URL: <input type="url" name="homepage"><br>
				</span>
			<p><input type="radio" name="recipeType" value='2'> Image</p>
				<span>
					Select a file: <input type="file" name="img"><br>
				</span>
			<p><input type="radio" name="recipeType" value='3'> Written In</p>
				<span>
					<textarea rows="10" cols="100" name="recipeInput">Type in your recipe here.</textarea><br>
				</span>
				
			<div id="show"></div>
			Recipe Name: <input type="text" name="recipeName"><br>
			<textarea rows="10" cols="100" name="briefDesc">Brief Description of your recipe.</textarea><br>
			<input type="submit" name="submit">
			
		</div>
		
		
		</form>
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
