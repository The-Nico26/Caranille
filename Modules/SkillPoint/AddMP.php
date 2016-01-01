<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);

if ($characterSkillPoint >= 1)
{
	addMP($bdd, $characterID);
	updateAllStats($bdd, $characterID);
	exit(header("Location: $linkRoot/Modules/SkillPoint/index.php")); 
}
else
{
	echo $skillpoint11;
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
