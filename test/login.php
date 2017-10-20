<?php
include_once 'session.php';
include_once '../api/1.0/includes.php';

if (!empty($_SESSION)) {
	echo 'already logged in as ' . $user;
	exit;
}

$username = $_POST["username"];
$password = $_POST["password"];

$database = new Database();
$database->changeDBName('users');
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query_str = 'SELECT `username`, `password` FROM `users` WHERE `username` = :username;';

$stmt = $db->prepare($query_str);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$hash = $row['password'];
$success = password_verify($password, $hash);

if ($success) {
	$_SESSION['username'] = $username;
	$_SESSION['last_action'] = time();
}

$rowCount = $stmt->rowCount();
?>

<!DOCTYPE html>
<html>
<body>
<?php if ($success) {
	echo 'logged in. thanks ' . $username . '. <a href="index.php">click to return</a>';
} else if ($rowCount == 0) {
	echo 'no user found with that name. <a href="index.php">click to return</a>';
} else { 
	echo 'failed to log in (wrong password?). <a href="index.php">click to return</a>';
} 
?>
</body>
</html>