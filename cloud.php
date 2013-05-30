<?php	

	$user = $_GET['user'];
	$app = $_GET['app'];
	$field = $_GET['field'];
	$val = $_GET['val'];
	$mode = $_GET['mode'];
	if ($mode === 'get'){
		echo "<div>It looks like you are requesting $user-$app-$field </div>";
	} else if ($mode === 'put'){		
		echo "<div>It looks like you are putting $user-$app-$field value=$val</div>";
	} 	else {
		echo "<div>I don't understand...$user-$app-$field mode=$mode</div>";	
	}
	
	$con = mysql_connect("localhost","852869_root","backpain");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("backpain_zxq_cloud", $con);
	
	if ($mode === 'put'){
		$qstring = "update  data set val='$val' where user='$user' and app='$app' and field='$field'";
		echo "<div>Update=$qstring</div>";
		mysql_query($qstring);
	}
	
	$qstring = "select val from data where user='$user' and app='$app' and field='$field'";
	echo "<div>Query=$qstring</div>";
	$result = mysql_query($qstring);
	if ($result) {
		$row = mysql_fetch_array($result);
		$savedVal = $row['val'];	
		echo "<div>Returning: $savedVal</div>";
	} else {
		echo "<div>No results found</div>";	
	}
?>