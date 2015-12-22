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

$missionNumber = htmlspecialchars(addslashes($_POST['missionNumber']));
$townID = htmlspecialchars(addslashes($_POST['townID']));
$missionName = htmlspecialchars(addslashes($_POST['missionName']));
$missionIntroduction = htmlspecialchars(addslashes($_POST['missionIntroduction']));
$missionVictory = htmlspecialchars(addslashes($_POST['missionVictory']));
$missionDefeate = htmlspecialchars(addslashes($_POST['missionDefeate']));
$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));

addMission($bdd, $missionNumber, $townID, $missionName, $missionIntroduction, $missionVictory, $missionDefeate, $monsterID); ?>

<?= $amission14 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
