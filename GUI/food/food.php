<?php
	require_once '../menu.inc.php';
	require_once '../common.inc.php';

	if (!loggedin()) {
		header('Location: ../index.php');
	}
	$url = "http://$_SERVER[HTTP_HOST]:84/read.php?";
	$studentNumber = $_SESSION['studentNumber'];
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
	<div id="presented">
		<div id="content">
			<form action="" method="GET"> 
				<table>
			  		<tr>
					    <th></th>
					    <?php
					    	for ($i=0; $i < count($r); $i++) { 
					    		echo '<th>'.$r[$i]['DayOfWeek'].'</th>';
					    	}
					    	echo "</tr>";
					    	echo "<tr>";
					    	echo '<td>Breakfast</td>';
					    	for ($i=0; $i < count($r); $i++) { 
					    		echo '<td></td>';
					    	}
					    	echo "</tr>";
					    	echo "<tr>";
					    	echo '<td>Lunch</td>';
					    	for ($i=0; $i < count($r); $i++) { 
					    		echo '<th>'.$r[$i]['Name'].'<br>'.'<input type="checkbox">'.$r[$i]['Price'].'</th>';
					    	}
					    	echo "</tr>";
					    	echo "<tr>";
					    	echo '<td>Dinner</td>';
					    	for ($i=0; $i < count($r); $i++) { 
					    		echo '<td></td>';
					    	}
					    ?>
					  
			  		
			  </table><br>
			  <button type="submit" name="submit">Submit</button>			
			</form>
			
			  <?php
			  	// for ($i=0; $i < count($r); $i++) { 
			  	// 			  	echo "<tr>";
			  	// 			  		echo '<td>'.$r[$i]['Number'].'</td>';
			  	// 			  		echo '<td>'.$r[$i]['Name'].'</td>';
			  	// 			  		echo '<td>'.$r[$i]['Unite'].'</td>';
			  	// 			  	echo "</tr>";		  
			// }
			?>

		</div>
	</div>
</div>
<!-- echo '<td>'.'<input type="checkbox" name="check_list[]" >'.'</td>'; -->


