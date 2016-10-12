<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "localhost";
  private $db = "cookbook";
  private $user = "root";
  private $pass = "mcps0324";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }
  
  public function doesUserExist($email, $password) {
	  $conn = $this->getConnection();
	  $query = "SELECT email, password FROM users WHERE email = :email and password = :password";
	  $q = $conn->prepare($query);
	  $q->bindParam(":email", $email);
	  $q->bindParam(":password", $password);
	  $q->execute();
	  $q = $q->fetch(PDO::FETCH_ASSOC);
	  if(count($q) > 0){
		return true;
	  } else {
		return false;  
	  }  
  }
}
  
  ?>