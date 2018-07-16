<?php
require_once '../menu.inc.php';
require_once '../common.inc.php';
// echo $_SESSION['studentNumber'];
// echo $_SESSION['stuSession'];
if (!loggedin()) {
	header('Location: ../index.php');
}
?>

<div class="center" id="news">
	<div id="presented">Lessons offered
		<div id="content"></div>
	</div>
	<div id="chosen">Selected lessons
		<div id="content"></div>
	</div>
</div>