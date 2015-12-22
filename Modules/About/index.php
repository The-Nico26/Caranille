<?php
$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

if(isset($account))
{
	redirectToLogin($accountID, $linkRoot);
	redirectToBattle($verifyBattle, $linkRoot);
}
echo "<br>
	<div class=\"panel panel-warning\">
		<div class=\"panel-heading\"></div>
		<div class=\"panel-body\">
		$about0
		</div>
	</div>";

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
?>