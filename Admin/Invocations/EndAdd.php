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

$invocationImage = $_POST['invocationImage'];
$invocationName = $_POST['invocationName'];
$invocationDescription = $_POST['invocationDescription'];
$invocationDamage = $_POST['invocationDamage'];
$invocationPrice = $_POST['invocationPrice'];
	
addInvocation($bdd, $invocationImage, $invocationName, $invocationDescription, $invocationDamage, $invocationPrice); ?>

<?= $ainvocation16 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>