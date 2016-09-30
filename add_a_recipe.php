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
		<h3>Add a Recipe:</h3>
		<div class="inputForms">
			<form>
				<input type="radio" name="recipeType" value="website" checked> Website<br>
				<input type="radio" name="recipeType" value="image"> Image<br>
				<input type="radio" name="recipeType" value="written"> Written In
			</form>
		</div>
		
		<div class="inputForms" id="add_a_website">
			<form>
				<input type="url" name="homepage">
			</form>
		</div>
		
		<div class="inputForms" id="add_an_image">
			<form>
				Select a file: <input type="file" name="img">
			</form>
		</div>
		
		<div class="inputForms" id="add_a_recipe">
			<form>
				<textarea rows="10" cols="100">
Type in your recipe here.
				</textarea><br>
			</form>
		</div>
		
		<div class="inputForms">
			<form>
				<textarea rows="10" cols="100">
Brief Description of your recipe.
				</textarea><br>
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
