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

echo "<br>
<div class=\"panel panel-warning\">
	<div class=\"panel-heading\"></div>
	<div class=\"panel-body\">
		<form method=\"POST\" action=\"EndAdd.php\">
			$amission6<br> <input class=\"form-control\" type=\"number\" name=\"missionNumber\" required autofocus><br>
			$amission7<br> <input class=\"form-control\" type=\"text\" name=\"missionName\" placeholder=\"$amission7\" required><br>
			$amission8<br> <textarea class=\"form-control\" name=\"missionIntroduction\" placeholder=\"$amission8\" required></textarea><br>
			$amission9<br> <textarea class=\"form-control\" name=\"missionVictory\" placeholder=\"$amission9\" required></textarea><br>
			$amission10<br> <textarea class=\"form-control\" name=\"missionDefeate\" placeholder=\"$amission10\" required></textarea><br>
			$amission11<br>";showAlltownsList($bdd, '0');echo "<br>
			$amission12<br>";showAllMonstersList($bdd, '0');
			
			echo "<br>
			<input class=\"btn btn-success\" type=\"submit\" name=\"add\" value=\"$achapter12\">
		</form>
	</div>
</div>";

require_once $_SESSION['File_Root'] .'/HTML/Footer.php';
?>
