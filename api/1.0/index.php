<?php

// debug lines
$debug = false;

include_once 'includes.php';

if ($debug) 
	echo $_SERVER['REQUEST_METHOD'] . "\n";
if ($debug) 
	print_r($_GET) . "\n";
$route = explode('/', $_GET['q']);

// no second-level resources yet
if ($_GET['q'] != $route[0]) {
	echo 'Invalid URI, no resource found';
	exit;
}

// lazy implementation of checking token

$headers = apache_request_headers();
if (!array_key_exists('Authorization', $headers)) {
	echo 'no authorization header provided';
	exit;
}

$arr = explode(' ', $headers['Authorization']);
$token = $arr[1];
if ($debug)
	echo $token;

$database = new Database();
$database->changeDBName('users');
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query_str = 'SELECT * FROM `users` WHERE `token` = :token;';
$stmt = $db->prepare($query_str);
$stmt->bindParam(':token', $token, PDO::PARAM_STR, 32);
$stmt->execute();

$rowCount = $stmt->rowCount();

if ($rowCount == 0) {
	echo 'missing or invalid token';
	exit;
}


// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instantiate resource object
switch ($route[0]) {
	case 'character':
		$resource = new Character();
		break;
	case 'npc':
		$resource = new NPC();
		break;
	case 'faction':
		$resource = new Faction();
		break;
	default:
		echo 'Invalid URI, no resource found';
		exit;
}

$database->changeDBName('pf_database');
$db = $database->getConnection();

if ($debug) 
	print_r($route);

$table_name = $resource->getTableName();
$query = new Query($table_name, $_GET);

if ($debug) 
	echo "\n" . $query->query_str;

// prepare query statement
$query->prepareQuery($resource, $query->query_str, $db);
$query->bindQueryParams($resource, $_GET);

// execute query
$query->stmt->execute();
$num = $query->stmt->rowCount();

// check if more than 0 record is found
if ($num > 0) {
	// products array
	$resource_arr = array();
	$resource_arr["results"] = array();

	// retrieve the contents of the table
	while ($row = $query->stmt->fetch(PDO::FETCH_ASSOC)) {
		// note: extract() turns key => value into $key = value
		extract($row);
		$resource_item = array(
			"id" => $id,
			"name" => $name,
			"sprite" => $sprite,
			"description" => $description
		);

		array_push($resource_arr["results"], $resource_item);
	}

	echo json_encode($resource_arr, JSON_PRETTY_PRINT);
} else {
	echo json_encode(
		array("message" => "No characters found.")
	);
}