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

$itemPicture = htmlspecialchars(addslashes($_POST['itemPicture']));
$itemType = htmlspecialchars(addslashes($_POST['itemType']));
$itemLevel = htmlspecialchars(addslashes($_POST['itemLevel']));
$itemName = htmlspecialchars(addslashes($_POST['itemName']));
$itemDescription = htmlspecialchars(addslashes($_POST['itemDescription']));
$itemHP = htmlspecialchars(addslashes($_POST['itemHP']));
$itemMP = htmlspecialchars(addslashes($_POST['itemMP']));
$itemPurchase = htmlspecialchars(addslashes($_POST['itemPurchase']));
$itemSale = htmlspecialchars(addslashes($_POST['itemSale']));

addItem($bdd, $itemPicture, $itemType, $itemLevel, $itemName, $itemDescription, $itemHP, $itemMP, $itemPurchase, $itemSale); ?>

<?= $aitem19 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
