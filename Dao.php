<?php
class Dao {
	private $host = "us-cdbr-iron-east-04.cleardb.net";
	private $db = "heroku_d49a7d31efccd7";
	private $user = "bab4dd1cb60954";
	private $pass = "f5dffe97";
	pubic function getConnection() {
		return
		new PDO("mysql:host={$this->host};dbname={$this->dbname};
	}
}
