<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$townID = htmlspecialchars(addslashes($_POST['townID']));

echo "<br>
<div class=\"panel panel-warning\">
	<div class=\"panel-heading\"></div>
	<div class=\"panel-body\">
		<form method=\"POST\" action=\"Add.php\">";
			showAllInvocationsList($bdd, "0");
			echo "<input type=\"hidden\" name=\"townID\" value=\"$townID\">
			<input class=\"btn btn-success\" type=\"submit\" name=\"addMagic\" value=\"$atown22\">
		</form>";
		showInvocationsTown($bdd, $townID);
	echo "</div>
</div>";

require_once $_SESSION['File_Root'] .'/HTML/Footer.php';
?>
