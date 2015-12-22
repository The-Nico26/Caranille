<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$newsTitle = htmlspecialchars(addslashes($_POST['newsTitle']));
$newsMessage = htmlspecialchars(addslashes($_POST['newsMessage']));
$newsAccountPseudo =  htmlspecialchars(addslashes($_POST['newsAccountPseudo']));
	
addNews($bdd, $newsTitle, $newsMessage, $newsAccountPseudo); ?>

<?= $anews13 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>