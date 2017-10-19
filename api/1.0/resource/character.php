<?php

include_once 'resource.php';

class Character extends Resource {
	protected $table_name = 'characters';

	public $id;
	public $name;
	public $gender;
	public $nation;
	public $location;
	public $hp_rating;
	public $sp_rating;
	public $str_rating;
	public $dex_rating;
	public $agi_rating;
	public $int_rating;
	public $description;
	public $sprite;
	public $static_sprite;

	public $property_types = [
		'id' => 'int',
		'name' => 'string',
		'gender' => 'string',
		'nation' => 'string',
		'location' => 'string',
		'hp_rating' => 'string',
		'sp_rating' => 'string',
		'str_rating' => 'string',
		'dex_rating' => 'string',
		'agi_rating' => 'string',
		'int_rating' => 'string',
		'description' => 'string',
		'sprite' => 'string',
		'static_sprite' => 'string'
	];

}