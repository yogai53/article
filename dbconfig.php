<?php

class Db
{
	private $servername;
	private $username;
	private $password;
	private $db;
	private $conn;

	public function __construct(){
		$this->servername = "localhost";
		$this->username = "homestead";
		$this->password = "secret";
		$this->db = 'article';
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
	}

	public function register($name, $email, $password, $phone){
		$stmt = $this->conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");

		$stmt->bind_param("ssss", $bindName, $bindEmail, $bindPassword, $bindPhone);

		$bindName = $name;
		$bindEmail = $email;
		$bindPassword = $password;
		$bindPhone = $phone;
		$execution = $stmt->execute();
		$stmt->close();
		return $execution;	
	}

	public function conClose(){
		$this->conn->close();
	}
}



