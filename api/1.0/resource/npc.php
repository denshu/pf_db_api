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
}