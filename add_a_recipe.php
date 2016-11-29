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
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="js/form-validation.js"></script>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<h3>Add a Recipe:</h3>
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
		<form action="action_add_recipe.php" method="POST" name="addRecipe">
		<div class="inputForms">
			
			<p><input type="radio" name="recipeType" value='1' checked> Website</p>
				<span>
					URL: <input type="url" name="homepage" value="<?php if(isset($_SESSION['presets']['homepage'])){echo $_SESSION['presets']['homepage'];}?>"><br>
				</span>
			<p><input type="radio" name="recipeType" value='2'> Image</p>
				<span>
					Select a file: <input type="file" name="img" value="<?php if(isset($_SESSION['presets']['img'])){echo $_SESSION['presets']['img'];}?>"><br>
				</span>
			<p><input type="radio" name="recipeType" value='3'> Written In</p>
				<span>
					<textarea rows="10" cols="100" name="recipeInput" value="<?php if(isset($_SESSION['presets']['recipeInput'])){echo $_SESSION['presets']['recipeInput'];}?>">Type in your recipe here.</textarea><br>
				</span>
				
			<div id="show"></div>
			Recipe Name: <input type="text" name="recipeName" value="<?php if(isset($_SESSION['presets']['recipeName'])){echo $_SESSION['presets']['recipeName'];}?>"><br>
			<textarea rows="10" cols="100" name="briefDesc" value="<?php if(isset($_SESSION['presets']['briefDesc'])){echo $_SESSION['presets']['briefDesc'];}?>">Brief Description of your recipe.</textarea><br>
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
