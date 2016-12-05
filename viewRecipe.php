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
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
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
			$recipeName = $_GET['rN'];
			$recipeName = str_replace('_', ' ', $recipeName);
			$recipe = $dao->getRecipe($email, $recipeName);
			foreach ($recipe as $rec){
				echo "<h3>" . $recipeName . "</h3>";
				echo "<div id=\"viewRecipe\">";
				if($rec->recipeType == 1){
					$url = $rec->url;
					echo "<a href=\"" . $url . "\">" . $url . "</a>";
				}
				if($rec->recipeType == 2){
					$photoPath = $rec->photoPath;
					echo "<img src=\"" . $photoPath . "\" id=\"viewRecipePicture\"";
				}
				if($rec->recipeType == 3){
					echo "Its a text file";
					$textPath = $rec->filePath;
					
				}
				echo "</div>";
			}
			$dao->updateViewDate ($email, $recipeName);
		?>
	</div>

	<div id="footer">
		<?php
			include 'footer.php';
		?>
	</div>

</body>
</html>
