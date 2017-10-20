<h3>API call for characters</h3>
<form action="api_call.php" method="POST">
	token <input type="text" name="token" /><br><br>
	id <input type="text" name="id" /><br>
	name <input type="text" name="name" /><br>
	<?php
	// lazy so reusing old code from live site
	// TODO: convert to PDO
	$con = mysqli_connect("localhost","root","DSFARGEG","pf_database");

	// Selecting by gender
	echo 'gender <select name="gender"><option></option>';
	$selection = "SELECT DISTINCT gender FROM characters ORDER BY gender";
	$result = mysqli_query($con, $selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["gender"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["gender"], '</option>';
	}
	echo '</select><br>';

	// Selecting by nation
	echo 'faction <select name="nation"><option></option>';
	$selection = "SELECT DISTINCT nation FROM characters ORDER BY nation";
	$result = mysqli_query($con,$selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["nation"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["nation"], '</option>';
	}
	echo '</select><br>';

	// Selecting by location
	echo 'location <select name="location"><option></option>';
	$selection = "SELECT DISTINCT location FROM characters ORDER BY location";
	$result = mysqli_query($con, $selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["location"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["location"], '</option>';
	}
	echo '</select><br>';

	mysqli_free_result($result);
	?>
	hp_rating <select name="hp_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	sp_rating <select name="sp_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	str_rating <select name="str_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	dex_rating <select name="dex_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	agi_rating <select name="agi_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	int_rating <select name="int_rating">
		<option></option>
		<option>S</option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
	<input type="hidden" name="table" value="character" /> 
	<input type="submit" value="submit" />
</form>
<br>
<h3>API call for NPCs</h3>
<form action="api_call.php" method="GET">
	token <input type="text" name="token" /><br><br>
	id <input type="text" name="id" /><br>
	name <input type="text" name="name" /><br>
	<?php
	// lazy so reusing old code from live site
	// TODO: convert to PDO
	$con = mysqli_connect("localhost","root","DSFARGEG","pf_database");

	// Selecting by gender
	echo 'gender <select name="gender"><option></option>';
	$selection = "SELECT DISTINCT gender FROM npcs ORDER BY gender";
	$result = mysqli_query($con, $selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["gender"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["gender"], '</option>';
	}
	echo '</select><br>';

	// Selecting by nation
	echo 'faction <select name="nation"><option></option>';
	$selection = "SELECT DISTINCT nation FROM npcs ORDER BY nation";
	$result = mysqli_query($con,$selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["nation"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["nation"], '</option>';
	}
	echo '</select><br>';

	// Selecting by location
	echo 'location <select name="location"><option></option>';
	$selection = "SELECT DISTINCT location FROM npcs ORDER BY location";
	$result = mysqli_query($con, $selection);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo '<option>', $row["location"], '</option>';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<option>', $row["location"], '</option>';
	}
	echo '</select><br>';
	?>
	<input type="hidden" name="table" value="npc" />
	<input type="submit" value="submit" />
</form>