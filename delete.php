<?php

	require_once 'dbconfig_2.php';
	
	if ($_REQUEST['delete']) {
		
		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM student1 WHERE full_name =:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			echo "Item unregistered Successfully ...";
		}
		
	}
	?>