<?php

class Database {
	private $host = "localhost";
	private $db_name = "pf_database";
	private $username = "root";
	private $password = "DSFARGEG";
	public $conn;

	public function changeDBName($name) {
		$this->db_name = $name;
	}

	public function getConnection() {
		$this->conn = null;

		try {
			$this->conn = new PDO(
				"mysql:host=" . $this->host . ";dbname=" . $this->db_name,
				$this->username,
				$this->password
			);
			$this->conn->exec("set names utf8");
		} catch(PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}

		return $this->conn;
	}
}