<?php

class Query {
	public $options;
	public $sort;
	public $order;
	public $limit;

	public $query_str;

	public function __construct($table_name, $params) {
		$this->query_str = $this->updateQueryString($table_name, $params);
		return $this;
	}

	public function updateQueryString($table_name, $params) {
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
				default:
					$this->options[$param] = $val;
					break;
			}
		}

		if (!empty($this->options)) {
			$this->query_str .= " WHERE ";
			$first = true;

			function endKey($array){
				end($array);
				return key($array);
			}
			$end = endKey($this->options);

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
		$this->query_str .= ";";
		return $this->query_str;
	}
}