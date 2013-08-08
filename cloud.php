<?php	
	/* Joe Kimpel 8.7.13 Just for fun */
	$user = $_GET['user'];
	$app = $_GET['app'];
	$field = $_GET['field'];
	$val = $_GET['val'];
	$mode = $_GET['mode'];
	//if ($mode === 'get'){
	//	echo "<div>It looks like you are requesting $user-$app-$field </div>";
	//} else if ($mode === 'put'){		
	//	echo "<div>It looks like you are putting $user-$app-$field value=$val</div>";
	//} 	else {
	//	echo "<div>I don't understand...$user-$app-$field mode=$mode</div>";	
	//}
	
	$con = mysql_connect("localhost","852869_root","backpain");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("backpain_zxq_cloud", $con);
	
	if ($mode === 'put'){
		$qstring = "select count(val) from data where user='$user' and app='$app' and field='$field'";
		//echo "<div>Query=$qstring</div>";
		$result = mysql_query($qstring);
		$numResults = 0;
		if ($result) {
			$row = mysql_fetch_array($result);
			$numResults = $row[0];
		}
		if ($numResults != 0) {
			$qstring = "select val from data where user='$user' and app='$app' and field='$field'";
			$result = mysql_query($qstring);
			$row = mysql_fetch_array($result);
			$savedVal = $row['val'];	
			//echo "<div>Replacing: $savedVal</div>";
			$qstring = "update data set val='$val' where user='$user' and app='$app' and field='$field'";
			//echo "<div>Update=$qstring</div>";
			mysql_query($qstring);
		} else {
			//echo "<div>No results found, saving new</div>";
			$qstring = "insert into data (user, app, field, val) values ('$user', '$app', '$field', '$val')";
			//echo "<div>Insert=$qstring</div>";
			mysql_query($qstring);
		}
	}
	
	$qstring = "select val from data where user='$user' and app='$app' and field='$field'";
	//echo "<div>Query=$qstring</div>";
	$result = mysql_query($qstring);
	if ($result) {
		$row = mysql_fetch_array($result);
		$savedVal = $row['val'];	
		echo "$savedVal";
	} else {
		echo "error";	
	}
?>
