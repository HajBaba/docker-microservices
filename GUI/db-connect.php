<?php
require_once 'common.inc.php';
$authenticate = "http://".$_SERVER['HTTP_HOST'].":8080/student/login";

echo "string1";
$link = new mysqli("db_service", "auth_service_user", "Auth_service@1397", "cc_project_database");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$query = "SELECT * FROM `students`";
$result = mysqli_query($link,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
print_r($row);
echo "string3";
?>    

<form action="index.php" >
  Student ID:<br>
  <input type="number" name="studentNumber"><br>
  Password:<br>
  <input type="password" name="password" ><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>