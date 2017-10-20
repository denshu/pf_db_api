<?php
include_once 'session.php';
include_once '../api/1.0/includes.php';

if (empty($session_vars)) {
	echo 'you are not logged in. <a href="index.php">begone heathen</a>';
	exit;
}

$token = substr(bin2hex(random_bytes(32)), 32);

$database = new Database();
$database->changeDBName('users');
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query_str2 = 'UPDATE `users` SET `token`=:token WHERE `username`=:username';
$stmt = $db->prepare($query_str2);
$stmt->bindParam(':username', $session_vars['username'], PDO::PARAM_STR);
$stmt->bindParam(':token', $token, PDO::PARAM_STR, 32);
$stmt->execute();

?>
<!DOCTYPE html>
<html>
<body>
	<div>
	<?php if ($stmt->rowCount() > 0) { ?>
		your new token is <br>
		<?php echo $token; ?><br>
		please do not share this. <br>
		anyway, <a href="index.php">click here to return</a>
	<?php } else { ?>
		an error occurred. <a href="index.php">click to return</a>
	<?php } ?>
	</div>
</body>
</html>