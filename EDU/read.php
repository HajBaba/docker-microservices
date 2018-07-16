<?php
require_once 'connect.inc.php';
if (isset($_GET['studentNumber']) && !empty($_GET['studentNumber'])) {
	$query="SELECT Number,Name,Unite FROM `Courses`";
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

	


?>
