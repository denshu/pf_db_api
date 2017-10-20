<?php
include_once 'session.php';

?>
<!DOCTYPE html>
<html>
<?php if (empty($_SESSION)) { ?>
	<h2>login</h2>
	<form action="login.php" method="POST">
		username <input type="text" name="username" /> <br>
		password <input type="password" name="password" /> <br>
		<input type="submit" value="submit" />
	</form>

	<h2>register</h2>
	<form action="register.php" method="POST">
		username <input type="text" name="username" /> <br>
		password <input type="password" name="password" /> <br>
		<input type="submit" value="submit" />
	</form>

	<h2>forgot</h2>
	<form action="forgot_password.php" method="POST">
		username <input type="text" name="username" /> <br>
		<input type="submit" value="submit" />
	</form>
<?php } else { ?>
	<div>
		hi <?php echo $session_vars['username']; ?>.
	</div>
	<br>
	<div>
		your token: <?php echo $session_vars['token']; ?>
		<form action="generate_token.php" method="POST">
			<input type="submit" value="generate new token" />
		</form>
	</div>
	<div>
		<?php include_once 'api_call_form.php'; ?>
	</div>
	<div>
		<h4>log out</h4>
		<form action="logout.php">
			<input type="submit" value="log out" />
		</form>
	</div>
<?php } ?>


</html>