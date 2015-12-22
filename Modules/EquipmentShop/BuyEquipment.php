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

$equipmentID = htmlspecialchars(addslashes($_POST['EquipmentID']));

$canBePurchased = canBePurchased($bdd, $equipmentID, $characterTownID);

if ($canBePurchased == 1)
{
	$number = verifyEquipment($bdd, $equipmentID, $characterID);
	if ($number <= 0)
	{
		$equipment = newEquipment($bdd, $equipmentID);
		addEquipment($bdd, $equipmentID, $characterID);
		$gold = $character->getGold() - $equipment->getPurchase();
		updateCharacterGold($bdd, $gold, $characterID);
	}
	else
	{
		updateEquipment($bdd, $characterID, $equipmentID);
	}	
}
else
{
	echo "An error has surved";
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
