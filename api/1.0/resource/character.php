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

}