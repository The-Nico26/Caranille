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

$equipmentImage = htmlspecialchars(addslashes($_POST['equipmentImage']));
$equipmentType = htmlspecialchars(addslashes($_POST['equipmentType']));
$equipmentLevel = htmlspecialchars(addslashes($_POST['equipmentLevel']));
$equipmentName = htmlspecialchars(addslashes($_POST['equipmentName']));
$equipmentDescription = htmlspecialchars(addslashes($_POST['equipmentDescription']));
$equipmentHP = htmlspecialchars(addslashes($_POST['equipmentHP']));
$equipmentMP = htmlspecialchars(addslashes($_POST['equipmentMP']));
$equipmentStrength = htmlspecialchars(addslashes($_POST['equipmentStrength']));
$equipmentMagic = htmlspecialchars(addslashes($_POST['equipmentMagic']));
$equipmentAgility = htmlspecialchars(addslashes($_POST['equipmentAgility']));
$equipmentDefense = htmlspecialchars(addslashes($_POST['equipmentDefense']));
$equipmentSagesse = htmlspecialchars(addslashes($_POST['equipmentSagesse']));
$equipmentPurchase = htmlspecialchars(addslashes($_POST['equipmentPurchase']));
$equipmentSale = htmlspecialchars(addslashes($_POST['equipmentSale']));
$equipmentID = htmlspecialchars(addslashes($_POST['equipmentID']));

updateequipment($bdd, $equipmentID, $equipmentImage, $equipmentType, $equipmentLevel, $equipmentName, $equipmentDescription, $equipmentHP, $equipmentMP, $equipmentStrength, $equipmentMagic
, $equipmentAgility, $equipmentDefense, $equipmentSagesse, $equipmentPurchase, $equipmentSale); ?>

<?= $aequipment25 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
