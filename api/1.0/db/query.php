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
	* @param array  $params			$_GET parameters
	* @param bool	$return			do ya wanna return the updated string
	*
	* @return string 				The new query string
    */
	public function createQueryString($table_name, $params, $return = false) {
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
		
		if ($return)
			return $this->query_str;
		else 
			return;
	}

	/**
	* Prepare query for execution
	*
	* @param Resource $resource		API resource (with database connection)
	* @param string $query_str		SQL query (string)
	*
	* @return PDOStatement 		statement object to be executed
    */
	public function prepareQuery($resource, $query_str) {
		$this->stmt = $resource->getConn()->prepare($query_str);
		return $this->stmt;
	}

	/**
	*
	*/
	public function bindQueryParams($resource, $params) {

	}

}