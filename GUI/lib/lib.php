<?php
	require_once '../menu.inc.php';
	require_once '../common.inc.php';
	require_once 'menu.inc.php';
	if (!loggedin()) {
		header('Location: ../index.php');
	}
	$url = "http://$_SERVER[HTTP_HOST]:83/read.php?";
	$studentNumber = $_SESSION['studentNumber'];
	$session =  $_SESSION['stuSession'];
	$url = $url."studentNumber=$studentNumber&session=$session&act=b";
	$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => $url,
				    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
				));
	$resp = curl_exec($curl);
	curl_close($curl);
	$b = (json_decode($resp, true));

	$url = "http://$_SERVER[HTTP_HOST]:83/read.php?";
	$studentNumber = $_SESSION['studentNumber'];
	$session =  $_SESSION['stuSession'];
	$url = $url."studentNumber=$studentNumber&session=$session&act=r";
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
	<div id="presented">Borrowed books
		<div id="content">
			<table>
			  <tr>
			    <th>Title</th>
			    <th>Author</th>
			    <th>Borrow Date</th>
			    <th>Return Date</th>
			  </tr>
			  <?php
			  	for ($i=0; $i < count($b); $i++) { 
			  				  	echo "<tr>";
			  				  		echo '<td>'.$b[$i]['Title'].'</td>';
			  				  		echo '<td>'.$b[$i]['Author'].'</td>';
			  				  		echo '<td>'.$b[$i]['bDate'].'</td>';
			  				  		echo '<td>'.$b[$i]['rDate'].'</td>';
			  				  	echo "</tr>";		  
			}?>
		
			</table>
		</div>
		<div id="select"></div>
	</div>
	<div id="chosen">Books reserved
		<div id="content">
			<table>
			  <tr>
			    <th>Title</th>
			    <th>Author</th>
			  </tr>
			  <?php
			  	for ($i=0; $i < count($b); $i++) { 
			  				  	echo "<tr>";
			  				  		echo '<td>'.$r[$i]['Title'].'</td>';
			  				  		echo '<td>'.$r[$i]['Author'].'</td>';
			  				  	echo "</tr>";		  
			}?>
		
			</table>
		</div>
		<div id="select"></div>
	</div>
</div>

