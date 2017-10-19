<?php

include_once 'resource.php';

class NPC extends Resource {
	protected $table_name = 'npcs';

	public $id;
	public $name;
	public $gender;
	public $nation;
	public $location;
	public $description;
	public $sprite;
	public $static_sprite;

	public $property_types = [
		'id' => 'int',
		'name' => 'string',
		'gender' => 'string',
		'nation' => 'string',
		'location' => 'string',
		'description' => 'string',
		'sprite' => 'string',
		'static_sprite' => 'string'
	];
}