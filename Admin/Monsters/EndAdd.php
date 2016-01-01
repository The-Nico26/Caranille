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

$monsterImage = htmlspecialchars(addslashes($_POST['monsterImage']));
$monsterName = htmlspecialchars(addslashes($_POST['monsterName']));
$monsterDescription = htmlspecialchars(addslashes($_POST['monsterDescription']));
$monsterLevel = htmlspecialchars(addslashes($_POST['monsterLevel']));
$monsterStrength = htmlspecialchars(addslashes($_POST['monsterStrength']));
$monsterDefense = htmlspecialchars(addslashes($_POST['monsterDefense']));
$monsterHP = htmlspecialchars(addslashes($_POST['monsterHP']));
$monsterMP = htmlspecialchars(addslashes($_POST['monsterMP']));
$monsterMagic = htmlspecialchars(addslashes($_POST['monsterMagic']));
$monsterAgility = htmlspecialchars(addslashes($_POST['monsterAgility']));
$monsterExperience = htmlspecialchars(addslashes($_POST['monsterExperience']));
$monsterGold = htmlspecialchars(addslashes($_POST['monsterGolds']));

addMonster($bdd, $monsterImage, $monsterName, $monsterDescription, $monsterLevel, $monsterHP, $monsterMP,
$monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold); ?>
	
<?= $amonster20 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>