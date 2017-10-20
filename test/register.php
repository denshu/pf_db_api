<?php
include_once '../api/1.0/includes.php';
include_once 'session.php';

if (!empty($_SESSION)) {
	echo 'already logged in as ' . $user;
	exit;
}

$username = $_POST["username"];
$password = $_POST["password"];

if ((strlen($username) > 16) || (strlen($username) < 6)) { ?>
	username more than 6 chars, less than 16 chars please. <a href="index.php">click to return</a>
<?php 
	exit; 
}
if ((strlen($password) < 6) || (strlen($password) > 16)) { ?>
	password more than 6 chars, less than 16 chars please. <a href="index.php">click to return</a>
<?php 
	exit; 
}

$pw_hash = password_hash($password, PASSWORD_DEFAULT);

$token = substr(bin2hex(random_bytes(32)), 32);

$database = new Database();
$database->changeDBName('users');
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query_str = "SELECT * FROM users WHERE username = :username;";

$stmt = $db->prepare($query_str);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) { ?>
	user already exists. <a href="index.php">click to return</a>

	<?php
	exit;
}

$query_str2 = 'INSERT INTO `users` (`username`, `password`, `token`) VALUES (:username, :pw_hash, :token)';
$stmt = $db->prepare($query_str2);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':pw_hash', $pw_hash, PDO::PARAM_STR, 60);
$stmt->bindParam(':token', $token, PDO::PARAM_STR, 32);

$success = $stmt->execute();

if ($success) { ?>
	thanks for registering. <a href="index.php">click to return and log in</a>
<?php } else { ?>
	an error occurred. <a href="index.php">click to return</a>
<?php } ?>