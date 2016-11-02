<?php
class Dao {
	/*private $host = "us-cdbr-iron-east-04.cleardb.net";
	private $db = "heroku_d49a7d31efccd7";
	private $user = "bab4dd1cb60954";
	private $pass = "f5dffe97";
	pubic function getConnection() {
		return
		new PDO("mysql:host={$this->host};dbname={$this->dbname};
	} */
	private $host = "localhost/cs401";
	private $db = "marnett";
	private $user = "marnett";
	private $pass = "password";
	private $log;

	public function __construct() {
		$this->log = new KLogger("log.txt", KLogger::INFO);
	}

	public function getConnection() {
		return
			new PDO("mysql:host={this->host};dbname={this->db}", $this->user, $this->pass);
	}

	public function doesUserExist($email, $password) {
		$this->log->logInfo("[{$email}] attempting to log in...");
		$conn=$this->getConnection();
		$p = $conn->prepare("SELECT * FROM user where email =: email ANDpassword =: password");
		$p->bindParam(":email", $email);
		$p->bindParam(":password", $password);
		$p->execute();
		$results = $p->fetch(PDO::FETCH_ASSOC);
		if(is_array($results) && 0 < count($results)) {
			$this->log->logInfo("[{$email}] login was successful");
			return true;
		}else {
			$this->log->logInfo("[{$email}] login was NOT successful");
			return false;
		}
	}
}
