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
	
	$email = $_SESSION['email'];
		
	$nameCheck = $dao->getRecipeName($recipeName);
	
	if ($recipeName == $nameCheck){
		$_SESSION['messages'][] = "Recipe Name has already been used";
	}
	
	$folder = $_SESSION['folder'];
	$uploaddir = '/' . $folder . '/';
	
	$uploadfile = $uploaddir . basename($_FILES['img']['name']);
	
	if (move_uploaded_file($_FILES['img']['name'], $uploadfile)){
		$_SESSION['messages'][] = "file is valid, and was successfully uploaded.";
	} else {
		$_SESSION['messages'][] = "upload failed";
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
	
	$dao->insertRecipe ($email, $recipeName, $website, $uploadfile, $recipe, $description, $recipeType);
	
	header("Location:add_a_recipe.php");
?>