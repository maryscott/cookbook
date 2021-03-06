<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-iron-east-04.cleardb.net";
  private $db = "heroku_736ebfc29713504";
  private $user = "b339a02e0f2e3d";
  private $pass = "b9c455ce";
  
  /*private $host = "localhost";
  private $db = "cookbook";
  private $user = "root";
  private $pass = "mcps0324";*/
  
 public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }
  
  public function doesUserExist($email, $password) {
	  $conn = $this->getConnection();
	  $query = "SELECT password FROM users WHERE email = :email";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->execute();
	  $result = $q->fetch(PDO::FETCH_OBJ);
	  return $result;
  }
  
  public function registerUser ($email, $password, $fname, $lname, $tableName) {
	  $conn = $this->getConnection();
	  $query = "INSERT INTO users (email, password, firstName, lastName, tableName) VALUES(:email, :password, :fname, :lname, :tablename)";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->bindParam(":password", $password);
	  $q->bindParam(":fname", $fname);
	  $q->bindParam(":lname", $lname);
	  $q->bindParam(":tablename", $tableName);
	  return $q->execute();
  }
  
  public function createTable ($tablename){
	  $conn = $this->getConnection();
	  $query = "CREATE TABLE '$tablename' (RecipeType varchar(16) not null, RecipeName varchar(256) not null primary key, WebSite varchar(256) null,
				PicFilePath varchar(256) null, RecipeTxtFilePath varchar(256) null, BriefDescription varchar(512) null);";
	  $q = $conn->prepare($query);
		return $q->execute();
  }
  
  public function getTableName ($email){
	  $conn = $this->getConnection();
	  $query = "SELECT tableName FROM users WHERE email = :email";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->execute();
	   $result = $q->fetch(PDO::FETCH_OBJ);
	   return $result;
  }
  
  	public function insertRecipe ($email, $recipeName, $website, $img, $recipe, $description, $recipeType){
	  $conn = $this->getConnection();
	  $query = "Insert into recipes (email, recipeType, recipeName, briefDescription, url, photoPath, filePath) VALUES (:email, :recipeType, :recipeName, :description, :website, :img, :recipe)";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->bindParam(":recipeName", $recipeName);
	  $q->bindParam(":website", $website);
	  $q->bindParam(":img", $img);
	  $q->bindParam(":recipe", $recipe);
	  $q->bindParam(":description", $description);
	  $q->bindParam(":recipeType", $recipeType);
	  $q->execute();
	}
	
	public function getRecipeName ($recipeName) {
		$conn = $this->getConnection();
	  $query = "SELECT recipeName FROM recipes WHERE RecipeName = :recipeName";
	  $q = $conn->prepare($query);
	  $q->bindParam(":recipeName", $recipeName);
	  $q->execute();
	  $result = $q->fetch(PDO::FETCH_ASSOC);
	   return $result;
	}
	
	public function browseRecipes ($email) {
		$conn = $this->getConnection();
		$query = "SELECT recipeName, briefDescription FROM recipes WHERE email = :email";
		$q = $conn->prepare($query);
		$q->bindParam(":email", $email);
		$q->execute();
		$result = $q->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	
	public function recentlyViewed ($email) {
		$conn = $this->getConnection();
		$query = "SELECT recipeName, briefDescription FROM recipes WHERE email = :email ORDER BY dateViewed DESC LIMIT 5";
		$q = $conn->prepare($query);
		$q->bindParam(":email", $email);
		$q->execute();
		$result = $q->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	
	public function notRecentlyViewed ($email) {
		$conn = $this->getConnection();
		$query = "SELECT recipeName, briefDescription FROM recipes WHERE email = :email ORDER BY dateViewed ASC LIMIT 5";
		$q = $conn->prepare($query);
		$q->bindParam(":email", $email);
		$q->execute();
		$result = $q->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	
	public function updateViewDate ($email, $recipeName){
		$conn = $this->getConnection();
		$query = "UPDATE recipes SET dateViewed = curdate() WHERE email = :email and recipeName = :recipeName";
		$q = $conn->prepare($query);
		$q->bindParam(":email", $email);
		$q->bindParam(":recipeName", $recipeName);
		$q->execute();
	}
	
	public function getRecipe ($email, $recipeName) {
		$conn = $this->getConnection();
		$query = "SELECT * FROM recipes WHERE email = :email and recipeName = :recipeName";
		$q = $conn->prepare($query);
		$q->bindParam(":email", $email);
		$q->bindParam(":recipeName", $recipeName);
		$q->execute();
		$result = $q->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	
}
  
  ?>
