<?PHP
	include("i:/wamp64/www/advanced/backend/config/database.php");
	$query = "SELECT v_city_id, v_city_name FROM gnmm_city_master  WHERE v_state_id = ". $_GET['id'];//"SELECT DISTINCT v_city_id, v_city_name FROM gnmm_city_master";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) 
	{
		$name[] = $row['v_city_name'];
		$encid[] = $row['v_city_id'];
	}
	?>
	<select name="cmbcity" size="1" id="cmbcity" onchange="combocheck()">
	<?PHP
		for ($i = 0; $i < count($name); $i++) 
		{
			$option = $option."<option ";
			$option = $option."value=\"$encid[$i]\">$name[$i]</option> \n";
		}
	echo $option;
	?>
</select>
