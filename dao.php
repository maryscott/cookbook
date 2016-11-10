<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-iron-east-04.cleardb.net";
  private $db = "heroku_736ebfc29713504";
  private $user = "b339a02e0f2e3d";
  private $pass = "b9c455ce";
  
 public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }
  
  public function doesUserExist($email, $password) {
	  $conn = $this->getConnection();
	  $query = "SELECT password FROM users WHERE email = :email and password = :password";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->bindParam(":password", $password);
	  $q->execute();
	  $result = $q->fetch(PDO::FETCH_ASSOC);
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
	  $q->bindParam(":tableName", $tablename);
	  $q->execute();
  }
  
}
  
  ?>