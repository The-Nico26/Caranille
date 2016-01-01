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

$magicPicture = htmlspecialchars(addslashes($_POST['magicPicture']));
$magicName = htmlspecialchars(addslashes($_POST['magicName']));
$magicDescription = htmlspecialchars(addslashes($_POST['magicDescription']));
$magicType = htmlspecialchars(addslashes($_POST['magicType']));
$magicEffect = htmlspecialchars(addslashes($_POST['magicEffect']));
$magicMPCost = htmlspecialchars(addslashes($_POST['magicMPCost']));
$magicPrice = htmlspecialchars(addslashes($_POST['magicPrice']));

addMagic($bdd, $magicPicture, $magicName, $magicDescription, $magicType, $magicEffect, $magicMPCost, $magicPrice); ?>

<?= $amagics21 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>