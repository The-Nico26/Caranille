<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);

if ($characterAgility > $monsterAgility)
{
	$battle = findBattle($bdd, $characterID);
	deleteMonsterBattle($bdd, $battle['Battle_List_ID']);
	echo $battle30;
}
else
{
	exit(header("Location: $linkRoot/Modules/Battle/index.php")); 
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
?>