<?php
class Dao {
	
	private $host;
	private $db;
	private $user;
	private $pass;
	private $log;


	public function __contstruct() {
	
	  $this->host = "us-cdbr-iron-east-04.cleardb.net";
	  $this->db = "heroku_d49a7d31efccd7";
	  $this->user = "bab4dd1cb60954";
	  $this->pass = "f5dffe97";
		echo "constructed";
	
	}

	public function getConnection() {
		echo "getting connection";
		try {
		$conn = new PDO('mysql:dbname=heroku_d490a7d31efccd7;host=us-cdbr-iron-east-04.cleardb.net;port=3306', 'bab4dd1cb60954', 'f5dffe97');
		} catch (Exception $e) {
		echo print_r($e,1);	
		}
		echo "connection gotten";
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	exit;
		return $conn;
	}

	public function doesUserExist($email, $password) {
		$conn=$this->getConnection();
		$p = $conn->prepare("SELECT * FROM user where email = :email AND password = :password");
		$p->bindParam(':email', $email);
		$p->bindParam(':password', $password);
		$p->execute();
		if($p->fetch()) {
			return true;
		}else {
			return false;
		}
	}

	public function addUser($name, $email, $password, $occupation) {
		$conn=$this->getConnection();
		$save = "INSERT INTO user (name, email, password, occupation)
			 VALUES (:name, :email, :password, :occupation)";
		$p = $conn->prepare($save);
		$p->bindParam(':name', $name);
		$p->bindParam(':email', $email);
		$p->bindParam(':password', $password);
		$p->bindParam(':occupation', $occupation);
		
		try {
			$p->execute();
			return true;
		}catch(PDOException $e) {
			return false;
		}
	}

	public function getUser() {
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM user");
	}

	public function userExists() {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email, $email');
		$stmt->execute();
		if($stmt->fetch()) {
			return true;
		}else {
			return false;
		}
	}

	public function validateUser($email, $password) {
		$conn = $this->getConnection();
		$p = $conn->prepare("SELECT password, name FROM user WHERE email = :email");
		$p->bindParam('email', $email);
		$p->execute();
		return $p->fetch();
	}
}
