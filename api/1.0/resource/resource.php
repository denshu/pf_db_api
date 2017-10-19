<?php

// TODO: generalized functions for resources

abstract class Resource {
	private $conn;
	protected $table_name;

	public function __construct($db) {
		$this->conn = $db;
	}

	/**
	* Returns PDO connection (because $conn is private)
	*
	* @return PDO
    */
	public function getConn() {
		return $this->conn;
	}

	/**
	* Returns table name (because $table_name is protected)
	*
	* @return string 	the table name, of course
    */
	public function getTableName() {
		return $this->table_name;
	}

	function create() {
		// query to insert record
		// $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description";

		// // prepare query
		// $stmt = $this->conn->prepare($query);

		// // sanitize
		// $this->name = htmlspecialchars(strip_tags($this->name));
		// $this->description = htmlspecialchars(strip_tags($this->description));

		// // bind values
		// $stmt->bindParam(":name", $this->name);
		// $stmt->bindParam(":description", $this->description);

		// // execute query
		// if ($stmt->execute()) {
		// 	return true;
		// } else {
		// 	return false;
		// }
	}

	function read($query_object) {

		// $query = new Query();
		// $params = json_decode($parameters);

		// // query to select all
		// $query = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created FROM " . $this->table_name . " p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created DESC";

		// // prepare query statement
		// $stmt = $this->conn->prepare($query);

		// // execute query
		// $stmt->execute();

		// return $stmt; 
	}

	// used when filling up the update product form
	function readOne() {

	}
}