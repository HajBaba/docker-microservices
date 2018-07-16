<?php
	require_once '../menu.inc.php';
	require_once '../common.inc.php';

	if (!loggedin()) {
		header('Location: ../index.php');
	}
	$url = "http://$_SERVER[HTTP_HOST]:82/read.php?";
	$studentNumber = $_SESSION['studentNumber'];
	$session =  $_SESSION['stuSession'];
	$url = $url."studentNumber=$studentNumber&session=$session";
	$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => $url,
				    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
				));
	$resp = curl_exec($curl);
	curl_close($curl);
	$r = (json_decode($resp, true));
?>

<div class="center" id="news">
	<div id="presented">Courses offered
		<div id="content">
			<table>
			  <tr>
			    <th>Course number</th>
			    <th>Course Name</th>
			    <th>Unite</th>
			  </tr>
			  <?php
			  	for ($i=0; $i < count($r); $i++) { 
			  				  	echo "<tr>";
			  				  		echo '<td>'.$r[$i]['Number'].'</td>';
			  				  		echo '<td>'.$r[$i]['Name'].'</td>';
			  				  		echo '<td>'.$r[$i]['Unite'].'</td>';
			  				  	echo "</tr>";		  
			}?>
		
			</table>
		</div>
		<div id="select"></div>
	</div>
	<div id="chosen">Selected Courses
		<div id="content"></div>
		<div id="select"></div>
	</div>
</div>

