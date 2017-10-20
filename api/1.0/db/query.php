<?php

class Query {
	public $options;
	public $sort;
	public $order;
	public $limit;

	public $stmt;
	public $query_str;

	public function __construct($table_name, $params) {
		$this->createQueryString($table_name, $params, false);
		return $this;
	}

	/**
	* Create (or update) the MySQL query
	*
	* @param string $table_name		Name of table being used
	* @param array  $params			parameters
	* @param bool	$return_str		do ya wanna return the updated string
	*
	* @return string 				The new query string
    */
	public function createQueryString($table_name, $params, $return_str = false) {
		$this->query_str = "SELECT * FROM " . $table_name;
		foreach ($params as $param => $val) {
			switch ($param) {
				case 'q':
					break;
				case 'order':
					$this->order = $val;
					break;
				case 'sort':
					$this->sort = $val;
					break;
				case 'limit':
					$this->limit = $val;
					break;
				default:
					$this->options[$param] = $val;
					break;
			}
		}

		if (!empty($this->options)) {
			$this->query_str .= " WHERE ";
			$first = true;

			$end = Util::endKey($this->options);

			foreach ($this->options as $param => $val) {
				if (!is_numeric($val)) {
					$val = '"' . $val . '"';
				}
				$this->query_str .= $param . " = " . $val; 
				if ($end !== $param){
				    $this->query_str .= ' AND '; // not the last element
				}
			}
		}

		if ($this->order) {
			$this->query_str .= " ORDER BY " . $this->order;
		}
		if ($this->sort) {
			$this->query_str .= " " . $this->sort;
		}
		if ($this->limit) {
			$this->query_str .= " " . $this->limit;
		}
		$this->query_str .= ";";
		
		return $return_str ? ($this->query_str) : 0;
	}

	/**
	* Prepare query for execution
	*
	* @param Resource $resource		API resource (with database connection)
	* @param string $query_str		SQL query (string)
	* @param PDO $db 				PDO connection
    */
	public function prepareQuery($resource, $query_str, $db) {
		$this->stmt = $db->prepare($query_str);
	}

	/**
	* Bind query parameters to sanitize input
	*
	* @param Resource $resource 	the resource involved
	* @param array 	  $params 		parameters
	*/
	public function bindQueryParams($resource, $params) {
		foreach ($params as $param => $value) {

			$type = ($param !== 'q') ? $resource->property_types[$param] : '';

			switch ($type) {
				case 'int':
					$this->stmt->bindParam($param, $value, PDO::PARAM_INT);
					break;
				case 'string':
					$this->stmt->bindParam($param, $value, PDO::PARAM_INT);
					break;
				default:
					break;
			};
		}
	}
}