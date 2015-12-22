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

$inventoryID = htmlspecialchars(addslashes($_POST['inventoryID']));
$itemID = htmlspecialchars(addslashes($_POST['itemID']));
$itemQuantity = htmlspecialchars(addslashes($_POST['itemQuantity']));
$itemGold = htmlspecialchars(addslashes($_POST['itemGold']));
$itemType = htmlspecialchars(addslashes($_POST['itemType']));

if($itemType == 'Armor' || $itemType == 'Boots' || $itemType == 'Gloves' || $itemType == 'Helmet' || $itemType == 'Weapon')
{
	updateGold($bdd, $characterID, $itemGold);
	if($itemQuantity == '1')
	{
		deleteInventoryEquipment($bdd, $inventoryID);
	}
	else
	{
		updateInventoryEquipment($bdd, $inventoryID);
		updateStats($bdd, $characterID); 
		updateAllStats($bdd, $characterID);
	}
}
else
{
	updateGold($bdd, $characterID, $itemGold);
	deleteItem($bdd, $itemID, $characterID);
}
	
exit(header("Location: $linkRoot/Modules/Inventory/index.php")); 

require_once $_SESSION['File_Root'].'/HTML/Footer.php'; ?>
