<html>
<head>
	<?php
		session_start();
		require_once ('dao.php');
		$dao = new dao();
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
		<?php
			$email = $_SESSION['email'];
			$recipes = $dao->browseRecipes($email);
			foreach ($recipes as $recipe){
				$name = $recipe->recipeName;
				echo "<table id=\"browse\"><tr>";
				echo "<td><a href=\"viewRecipe.php?rN=" . str_replace(' ', '_', $name) . "\">" . $name . "</a></td>";
				echo "<td>" . $recipe->briefDescription . "</td>";
				echo "</tr></table>";
				
			}
		?>
	
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
