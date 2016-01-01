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

$itemID = htmlspecialchars(addslashes($_POST['itemID']));

$canBePurchased = canBePurchased($bdd, $itemID, $characterTownID);

if ($canBePurchased == 1)
{
	$item = newItem($bdd, $itemID);
	if($character->getGold() - $item->getPurchase() >= 0)
	{
		addItem($bdd, $itemID, $characterID);
		
		$gold = $character->getGold() - $item->getPurchase();
		
		updateCharacterGold($bdd, $gold, $characterID);
	} 
	else
	{
		echo $itemShop14;
	}
}
else
{
	echo "An error has surved";
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
