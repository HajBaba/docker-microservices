<?php
require_once 'menu.inc.php';
require_once 'common.inc.php';
if (!loggedin()) {
	header('Location: index.php');
}
?>
<div class="center" id="news">
	<header><h3>news</h3></header>
	<div id="content"></div>
</div>