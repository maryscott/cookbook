<?php
	session_start();
	require_once ('dao.php');
	$dao = new dao();

	$website = $_POST['homepage'];
	if (isset($_POST['img'])){
		$img = $_POST['img'];
	}
	$recipe = $_POST['recipeInput'];
	$description = $_POST['briefDesc'];
	$recipeType = $_POST['recipeType'];
	$recipeName = $_POST['recipeName'];
	
	$email = $_SESSION['email'];
		
	$nameCheck = $dao->getRecipeName($recipeName);
	
	if ($recipeName == $nameCheck){
		$_SESSION['message'][] = "Recipe Name has already been used";
	}
	
	if ($recipeType == 2){
		$folder = $_SESSION['folder'];
		$uploaddir = $folder . '/';
		$fileName = basename($_FILES['img']['name']);
		$fileName = str_replace('_', ' ', $fileName);
	
		$uploadfile = $uploaddir . $fileName;
	}
	
	if ($recipeType == 3){
		$recipeFile = "\\" . $_SESSION['folder'] . "\\" . $recipeName . ".txt";
        //Save File
        $file = fopen($recipeFile,"w+");
        $text = $recipe;
        if (file_put_contents($file, $text)){
			$_SESSION['message'][] = "file is valid, and was successfully uploaded.";
		} else {
			$_SESSION['message'][] = "upload failed";
			$_SESSION['message'][] = $recipe;
		}
        fclose($file);
    }
	
	if(move_uploaded_file($_FILES['img']['name'], $uploadfile)){
		$_SESSION['message'][] = "file is valid, and was successfully uploaded.";
	} else {
		$_SESSION['message'][] = "upload failed";
		$_SESSION['message'][] = $folder;
		$_SESSION['message'][] = $uploadfile;
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