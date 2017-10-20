<?php

// TODO: generalized functions for resources

abstract class Resource {
	private $conn;
	protected $table_name;

	public $property_types;

	/**
	* Returns table name (because $table_name is protected)
	*
	* @return string 	the table name, of course
    */
	public function getTableName() {
		return $this->table_name;
	}

	function create() {
	}

	function read() {
	}
}