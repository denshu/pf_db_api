<?php
include_once '../api/1.0/includes.php';
session_start();

$session_vars = [];

function getSessionVars() {
	$database = new Database();
	$database->changeDBName('users');
	$db = $database->getConnection();
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query_str = 'SELECT * FROM `users` WHERE `username` = :username;';
	$stmt = $db->prepare($query_str);
	$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$token = $row['token'];

	$vars = [
		'token' => $row['token'],
		'username' => $row['username']
	];
	return $vars;
}

$expire_min = 30;

if (isset($_SESSION['last_action'])) {
    $inactive = time() - $_SESSION['last_action'];
    $expire_sec = $expire_min * 60;

    if ($inactive >= $expire_sec) {
        session_unset();
        session_destroy();
    } else {
    	$_SESSION['last_action'] = time();
    	$session_vars = getSessionVars();
    }
}