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

$invocationID = htmlspecialchars(addslashes($_POST['invocationID']));

$canBePurchased = canBePurchased($bdd, $invocationID, $characterTownID);

if ($canBePurchased == 1)
{
	$number = verifyInvocation($bdd, $invocationID, $characterID);
	if ($number <= 0)
	{
		$invocation = newInvocation($bdd, $invocationID);
		addInvocation($bdd, $invocationID, $characterID);
		$gold = $character->getGold() - $invocation->getPrice();
		updateCharacterGold($bdd, $gold, $characterID);
	}
	else
	{
		echo "$temple8";
	}	
}
else
{
	echo "An error has surved";
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
