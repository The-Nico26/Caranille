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

$townPicture = htmlspecialchars(addslashes($_POST['townPicture']));
$townName = htmlspecialchars(addslashes($_POST['townName']));
$townDescription = htmlspecialchars(addslashes($_POST['townDescription']));
$townPriceInn = htmlspecialchars(addslashes($_POST['townPriceInn']));
$townChapter = htmlspecialchars(addslashes($_POST['townChapter']));
$townID = htmlspecialchars(addslashes($_POST['townID']));

updateTown($bdd, $townID, $townPicture, $townName, $townDescription, $townPriceInn, $townChapter); ?>

<?php $atown14 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>