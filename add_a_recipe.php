<html>
<head>
	<?php
		session_start();
		if ($_SESSION['logged_in'] == false){
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
		<div class="inputForms">
			<form>
				<input type="radio" name="recipeType" value="website" checked> Website<br>
				<input type="radio" name="recipeType" value="image"> Image<br>
				<input type="radio" name="recipeType" value="written"> Written In
			</form>
		</div>
		
		<div class="inputForms" id="add_a_website">
			<form action="action_add_recipe.php">
				URL: <input type="url" name="homepage">
				<input type="submit" name="submit">
			</form>
		</div>
		
		<div class="inputForms" id="add_an_image">
			<form action="action_add_recipe.php">
				Select a file: <input type="file" name="img">
				<input type="submit" name="submit">
			</form>
		</div>
		
		<div class="inputForms" id="add_a_recipe">
			<form action="action_add_recipe.php">
				<textarea rows="10" cols="100" name="recipeInput">Type in your recipe here.</textarea><br>
				<input type="submit" name="submit">
			</form>
		</div>
		
		<div class="inputForms" id="description">
			<form action="action_add_recipe.php">
				<textarea rows="10" cols="100" name="briefDesc">Brief Description of your recipe.</textarea><br>
				<input type="submit" name="submit">
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
