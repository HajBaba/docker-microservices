
<?php
require_once 'common.inc.php';
?>
<div class="center" id="intro">
	<p>سامانه آزمایشی جویا</p>
</div>
<div class="center" id="loginform">
	<div class="center" id="ATN"></div>
	<form action="" method="GET">
	      <input type="text" name="studentNumber" placeholder="Enter Student Number" required/><br><br>
	      <input type="password" name="password" placeholder="Enter password" required/><br><br>
	    <button type="submit" name="submit">Submit</button>
	</form>
</div>
</body>
</html>




<?php
if (loggedin()) {
	header('Location: dashboard.php');
}

	$url = "http://$_SERVER[HTTP_HOST]:8080/student/login?";
	if(isset($_GET['submit']))
		{
			$studentNumber = $_GET['studentNumber'];
			$url = $url."studentNumber=".$studentNumber;
			$url = $url."&password=".$_GET['password'];
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => $url,
			    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
			$resp = curl_exec($curl);
			curl_close($curl);
			$r = (json_decode($resp, true));
			if ($r['status'] == '404') {
				echo "<script>document.getElementById('ATN').innerHTML = 'no student exists with entered student number';</script>";
			}
			elseif ($r['status'] == '401') {
				echo "<script>document.getElementById('ATN').innerHTML = 'Password entered is not correct';</script>";
			} 
			elseif ($r['status'] == '200') {
				$tmp = $r['result'];
				$_SESSION['studentNumber'] = $studentNumber;
				$_SESSION['stuSession'] = $tmp['session'];
				header('Location: dashboard.php');
			}
			
		}
?>
