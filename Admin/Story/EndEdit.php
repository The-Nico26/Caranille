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

$chapterNumber = htmlspecialchars(addslashes($_POST['chapterNumber']));
$chapterName = htmlspecialchars(addslashes($_POST['chapterName']));
$chapterOpening = htmlspecialchars(addslashes($_POST['chapterOpening']));
$chapterEnding = htmlspecialchars(addslashes($_POST['chapterEnding']));
$chapterDefeate = htmlspecialchars(addslashes($_POST['chapterDefeate']));
$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));
$chapterID = htmlspecialchars(addslashes($_POST['chapterID']));

updateChapter($bdd, $chapterNumber, $chapterName, $chapterOpening, $chapterEnding, $chapterDefeate, $monsterID, $chapterID); ?>

<?php $achapter15 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>