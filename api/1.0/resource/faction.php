<?php
// does not actually exist yet
include_once 'resource.php';

class Faction extends Resource {
	protected $table_name = 'faction';

	public $id;
	public $name;
	public $etc;
}