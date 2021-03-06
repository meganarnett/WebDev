<?php
	require_once('password_compat/lib/password.php');
class Dao {

	public function getConnection() {
		try {
		$conn = new PDO('mysql:dbname=heroku_d490a7d31efccd7;host=us-cdbr-iron-east-04.cleardb.net;port=3306', 'bab4dd1cb60954', 'f5dffe97');
		} catch (Exception $e) {
		        echo print_r($e,1);	
			exit;
		}
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

	public function addUser($name, $email, $password, $occupation, $location, $inst) {
		//Hashing Password
		$digest = password_hash($pasword, PASSWORD_DEFAULT);
		if(!$digest) {
                        throw new Exception("Password could not be hashed.");
                }
		$conn=$this->getConnection();
		$save = "INSERT INTO user (name, email, password, occupation, location, instrument)
			 VALUES (:name, :email, :password, :occupation, :location, :instrument)";
		$p = $conn->prepare($save);
		$p->bindParam(':name', $name);
		$p->bindParam(':email', $email);
		$p->bindParam(':password', $digest);
		$p->bindParam(':occupation', $occupation);
		$p->bindParam(':location', $location);
		$p->bindParam(':instrument', $inst);
		
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
		if(($user = $p->fetch())) {
                        $digest = $user['password'];
                        if(password_verify($password, $digest)) {
                                return array('name' => $user['name']);
                        }
                }
                return false;
	}
	
	public function getNameStudent() {
		$conn = $this->getConnection();
		return $conn->query("SELECT name FROM user WHERE occupation='student'");
	}
	
	public function getNameTeacher() {
		$conn = $this->getConnection();
		return $conn->query("SELECT name FROM user WHERE occupation='teacher'");
	}
	
	public function getLoc($name) {
                $conn = $this->getConnection();
                $p = $conn->prepare("SELECT location FROM user WHERE name = :name limit 1");
                $p->bindParam(':name', $name);
                $p->execute();
                $result = $p->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }

        public function getOcc($name) {
                $conn = $this->getConnection();
                $p = $conn->prepare("SELECT occupation FROM user WHERE name = :name limit 1");
                $p->bindParam(':name', $name);
                $p->execute();
                $result = $p->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }

        public function getEmail($name) {
                $conn = $this->getConnection();
                $p = $conn->prepare("SELECT email FROM user WHERE name= :name limit 1");
                $p->bindParam(':name', $name);
                $p->execute();
                $result = $p->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }

        public function getInst($name) {
                $conn = $this->getConnection();
                $p = $conn->prepare("SELECT instrument FROM user WHERE name = :name limit 1");
                $p->bindParam(':name', $name);
                $p->execute();
                $result = $p->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }
	
	public function editProfile() {
                $conn = $this->getConnection();
                $save = "INSERT INTO user(location, occupation, instrument) VALUES(:location, :occupation, :instrument)";
                $q = $conn->prepare($save);
                $q->bindParam(":location", $location);
                $q->bindParam(":occupation", $occupation);
                $q->bindParam(":instrument", $inst);
                $q->execute();
        }
}
