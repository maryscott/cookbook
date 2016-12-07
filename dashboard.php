<?php
	session_start();
	if (empty($_SESSION['logged_in'])){
		header("Location:login.php");
	}
	require_once ('dao.php');
		$dao = new dao();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
	<div id="navbar" class="clearfix">
		<?php
			include "navbar.php";
		?>
	</div>

	<div id="content" class="clearfix">
		<div id="dashleft">
			<h4>Frequently View Recipes</h4>
			<?php
			$email = $_SESSION['email'];
			$recipes = $dao->recentlyViewed($email);
			foreach ($recipes as $recipe){
				$name = $recipe->recipeName;
				echo "<table id=\"dashboard\"><tr>";
				echo "<td><a href=\"viewRecipe.php?rN=" . str_replace(' ', '_', $name) . "\">" . $name . "</a></td>";
				echo "<td>" . $recipe->briefDescription . "</td>";
				echo "</tr></table>";	
			}
			?>
		</div>
		
		<div id="dashright">
			<h4>Recipes you have not viewed in a while</h4>
			<?php
			$email = $_SESSION['email'];
			$recipes = $dao->notRecentlyViewed($email);
			foreach ($recipes as $recipe){
				$name = $recipe->recipeName;
				echo "<table id=\"dashboard\"><tr>";
				echo "<td><a href=\"viewRecipe.php?rN=" . str_replace(' ', '_', $name) . "\">" . $name . "</a></td>";
				echo "<td>" . $recipe->briefDescription . "</td>";
				echo "</tr></table>";	
			}
			?>
		</div>
		<div>
			
		</div>
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
