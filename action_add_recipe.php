<?php
	session_start();
	require_once ('dao.php');
	$dao = new dao();

	$website = $_POST['homepage'];
	$img = $_POST['img'];
	$recipe = $_POST['recipeInput'];
	$description = $_POST['briefDesc'];
	$recipeType = $_POST['recipeType'];
	$recipeName = $_POST['recipeName'];
	
	$tableName = $_SESSION['tableName'];
		
	$nameCheck = $dao->getRecipeName($recipeName, $tableName);
	
	if ($recipeName == $nameCheck){
		$_SESSION['messages'][] = "Recipe Name has already been used";
	}
	
	if (isset($_SESSION['message'])){
		$_SESSION['presets']['homepage'] = $website;
		$_SESSION['presets']['img'] = $img;
		$_SESSION['presets']['briefDesc'] = $description;
		$_SESSION['presets']['recipeType'] = $recipeType;
		$_SESSION['presets']['recipeInput'] = $recipe;
		$_SESSION['presets']['tableName'] = $tableName;
		$_SESSION['presets']['recipeName'] = $recipeName;
		header("Location:add_a_recipe.php");
		exit;
	} 
	
	$dao->insertRecipe ($tableName, $recipeName, $website, $img, $recipe, $description, $recipeType);
	
	//header("Location:add_a_recipe.php");
?>