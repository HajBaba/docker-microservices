<!DOCTYPE html>
<html>
<head>
    <title>Jooya</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css">
</head>
<body>

<?php
session_start();

function loggedin()
{
	if (!isset($_SESSION['studentNumber']) || !isset($_SESSION['stuSession'])) {
		return 0;
	}
	if (empty($_SESSION['studentNumber']) || empty($_SESSION['stuSession'])) {
		return 0;
	}
	$url = "http://$_SERVER[HTTP_HOST]".":8080/authenticate?";
	$studentNumber = $_SESSION['studentNumber'];
	$stuSession = $_SESSION['stuSession'];
	$url = $url.'studentNumber='.$studentNumber.'&session='.$stuSession;
	$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => $url,
			    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
	$resp = curl_exec($curl);
	curl_close($curl);
	$r = (json_decode($resp, true));
	if ($r['status'] == 200) {
		return 1;
	}
	elseif ($r['status'] == 401) {
		return 0;
	}

}


?>


