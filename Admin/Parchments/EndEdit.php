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

$parchmentPicture = htmlspecialchars(addslashes($_POST['parchmentPicture']));
$parchmentLevel = htmlspecialchars(addslashes($_POST['parchmentLevel']));
$parchmentName = htmlspecialchars(addslashes($_POST['parchmentName']));
$parchmentDescription = htmlspecialchars(addslashes($_POST['parchmentDescription']));
$parchmentHP = htmlspecialchars(addslashes($_POST['parchmentHP']));
$parchmentMP = htmlspecialchars(addslashes($_POST['parchmentMP']));
$parchmentStrength = htmlspecialchars(addslashes($_POST['parchmentStrength']));
$parchmentMagic = htmlspecialchars(addslashes($_POST['parchmentMagic']));
$parchmentAgility = htmlspecialchars(addslashes($_POST['parchmentAgility']));
$parchmentDefense = htmlspecialchars(addslashes($_POST['parchmentDefense']));
$parchmentWisdom = htmlspecialchars(addslashes($_POST['parchmentWisdom']));
$parchmentPurchase = htmlspecialchars(addslashes($_POST['parchmentPurchase']));
$parchmentSale = htmlspecialchars(addslashes($_POST['parchmentSale']));
$parchmentID = htmlspecialchars(addslashes($_POST['parchmentID']));

updateParchment($bdd, $parchmentID, $parchmentPicture, $parchmentLevel, $parchmentName, $parchmentDescription, $parchmentHP, $parchmentMP, $parchmentStrength, $parchmentMagic
, $parchmentAgility, $parchmentDefense, $parchmentWisdom, $parchmentPurchase, $parchmentSale); ?>

<?= $aparchment20 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
