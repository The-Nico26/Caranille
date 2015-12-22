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

$parchment = newItem($bdd, $itemID);
$parchmentHP = $parchment->getHP();
$parchmentMP = $parchment->getMP();
$parchmentStrength = $parchment->getStrength();
$parchmentMagic = $parchment->getMagic();
$parchmentAgility = $parchment->getAgility();
$parchmentDefense = $parchment->getDefense();
$parchmentWisdom = $parchment->getSagesse();

addStats($bdd, $parchmentHP, $parchmentMP, $parchmentStrength, $parchmentMagic, $parchmentAgility, $parchmentDefense, $parchmentWisdom, $characterID);
deleteItem($bdd, $itemID, $characterID);
updateStats($bdd, $characterID); 
updateAllStats($bdd, $characterID);

exit(header("Location: $linkRoot/Modules/Inventory/index.php")); 

require_once $_SESSION['File_Root'].'/HTML/Footer.php'; ?>
