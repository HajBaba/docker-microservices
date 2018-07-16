<?php
require_once 'connect.inc.php';
 if (isset($_GET['studentNumber']) && !empty($_GET['studentNumber'])) {
	$studentNumber = $_GET['studentNumber'];
 	if ($_GET['act'] == 'b') {
		$query="SELECT Title,Author,bDate,rDate FROM `Books` WHERE stID = $studentNumber AND Status = 2";
		$result = mysqli_query($link,$query);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
	    $rows[] = $r;
		}
		mysqli_free_result($result);
		mysqli_close($link);
		$json_response = json_encode($rows);
		echo $json_response;
	 }

	if ($_GET['act'] == 'r') {
		$query="SELECT Title,Author FROM `Books` WHERE stID = $studentNumber AND Status = 3";
		$result = mysqli_query($link,$query);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
	    $rows[] = $r;
		}
		mysqli_free_result($result);
		mysqli_close($link);
		$json_response = json_encode($rows);
		header("HTTP/1.1".'200');
		print_r($json_response);
	}

 }
	


?>
