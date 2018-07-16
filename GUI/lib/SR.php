<?php
	require_once '../menu.inc.php';
	require_once '../common.inc.php';
	require_once 'menu.inc.php';
	$flag = 0;
	
	if (!loggedin()) {
		header('Location: ../index.php');
	}
	$url = "http://$_SERVER[HTTP_HOST]:83/search.php?";
	if(isset($_GET['Ssubmit']))
		{
			$_GET['Title'] = trim($_GET['Title']);
			$_GET['Author'] = trim($_GET['Author']);

			if (isset($_GET['Title']) && !empty($_GET['Title'])) {
				$url = $url."Title=".$_GET['Title'];
			}
			if (isset($_GET['Author']) && !empty($_GET['Author'])) {
				$url = $url."&Author=".$_GET['Author'];
			}
			echo $url;
			$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => $url,
				    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
				));
			$resp = curl_exec($curl);
			curl_close($curl);
			$r = (json_decode($resp, true));
			print_r($r);
			$flag = 1;

			
		}
		?>


<div class="center" id="news">
	<div id="presented">
		<div class="center" id="loginform">
			<form action="" method="GET">
			      <input type="text" name="Title" placeholder="Enter book title" required/><br><br>
			      <input type="text" name="Author" placeholder="Enter author name" required/><br><br>
			    <button type="submit" name="Ssubmit">Search</button>
			</form>
		</div>
		<div id="before">
			
				<form action="" method="GET">
					<?php
					if (isset($flag) && !empty($flag)) {
						# code...
					
						echo "<script>document.getElementById('before').id = 'chosen';</script>";
						echo "<table>";
						echo "<th>check</th>";
						echo "<th>Title</th>";
						echo "<th>Author</th>";
						echo "<th>Status</th>";
						for ($i=0; $i < count($r); $i++) { 
							echo "<tr>";
			  				  		echo '<td>'.'<input type="checkbox" name="check_list[]" >'.'</td>';
			  				  		echo '<td>'.$r[$i]['Title'].'</td>';
			  				  		echo '<td>'.$r[$i]['Author'].'</td>';
			  				  		echo '<td>'.$r[$i]['Status'].'</td>';
			  				  	echo "</tr>";	
						}		

						echo "</table>";
						echo '<input type="submit" name="Ssubmit" Value="Submit"/>';
					}
					?>	

					
									
				</form>
		</div>
	</div>
</div>


