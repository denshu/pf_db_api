<?php

class Util {
	/**
	* Get last key of array
	*
	* @param array $array	array (lol)
	*
	* @return string 		the last key
    */
	public static function endKey($array){
		end($array);
		return key($array);
	}
}