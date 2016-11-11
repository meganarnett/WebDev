<?php
class Dao {
	private $host = "us-cdbr-iron-east-04.cleardb.net";
	private $db = "heroku_d49a7d31efccd7";
	private $user = "bab4dd1cb60954";
	private $pass = "f5dffe97";
/*
	pubic function getConnection() {
		return
		new PDO("mysql:host={$this->host};dbname={$this->dbname};
	}
	private $host = "localhost/cs401";
	private $db = "marnett";
	private $user = "marnett";
	private $pass = "password";
	private $log;
*/

	public function getConnection() {
		$conn = new PDO("mysql:host={$this->host};dbname={$this->db}", "$this->user", "$this->pass");
		$conn->setAttribute(PDO::AFTER_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}

	public function doesUserExist($email, $password) {
		$conn=$this->getConnection();
		$p = $conn->prepare("SELECT * FROM user where email = :email ANDpassword = :password");
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
		$p = $conn->prepare($query);
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
?>
