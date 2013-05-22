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
	} else {
		echo "<div>I don't understand...$user-$app-$field mode=$mode</div>";	
	}
?>