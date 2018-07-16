<?php
require_once 'connect.inc.php';

$Title = trim($_GET['Title']);
$Author = trim($_GET['Author']);

if (isset($Title) && !empty($Title) && isset($Author) && !empty($Author)) {
	$query="SELECT Title,Author,Status FROM `Books` WHERE Title LIKE '%".$Title."%' OR Author LIKE '%".$Author."%'";
}

if (isset($Title) && !empty($Title) && (!isset($Author) || empty($Author))) {
	$query="SELECT Title,Author,Status FROM `Books` WHERE Title LIKE '%".$Title."%'";
}

if (isset($Author) && !empty($Author) && (!isset($Title) || empty($Title))) {
	$query="SELECT Title,Author,Status FROM `Books` WHERE Author LIKE '%".$Author."%'";

}

$result = mysqli_query($link,$query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
	$rows[] = $r;
	}
mysqli_free_result($result);
mysqli_close($link);
$json_response = json_encode($rows);
echo $json_response;

?>