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
$inventoryID = htmlspecialchars(addslashes($_POST['InventoryID']));
$itemID = htmlspecialchars(addslashes($_POST['itemID']));
$itemType = htmlspecialchars(addslashes($_POST['itemType']));


if($itemType == 'Armor' || $itemType == 'Boots' || $itemType == 'Gloves' || $itemType == 'Helmet' || $itemType == 'Weapon')
{
	$item = newEquipment($bdd, $itemID);
}
else
{
	$item = newItem($bdd, $itemID);
}

if($item->getLevel() <= $characterLevel)
{
	if(verifyEquip($bdd, $characterID, $itemType, $itemID, '0')['Inventory_Equipment_Equipped'] == '0')
	{
		$itemIDEquip = verifyEquipID($bdd, $characterID, $itemType)['Inventory_Equipment_ID'];
		initialEquip($bdd, $characterID, $itemType, '0');
	
	}
	updateEquip($bdd, $characterID, $itemID, '1');
	updateStats($bdd, $characterID); 
	updateAllStats($bdd, $characterID);
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>