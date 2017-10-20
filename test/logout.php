<?php
include_once 'session.php';

if (empty($_SESSION)) {
	echo 'you are already logged out?';
	exit;
}

$_SESSION = [];
session_unset();
$success = session_destroy() ? true : false;
?>

<?php if ($success) { ?>
	thanks for testing this. <a href="index.php">click to return</a>
<?php } else { ?>
	honestly, i don't know how logging out failed. <a href="index.php">still, click to return</a>
<?php } ?>