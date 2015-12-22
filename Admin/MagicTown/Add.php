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

$townID = htmlspecialchars(addslashes($_POST['townID']));
$magicID = htmlspecialchars(addslashes($_POST['magicID']));

addMagicTown($bdd, $townID, $magicID); ?>

<?= $atown24 ?>

<form method="POST" action="index.php">
	<input type="hidden" name="townID" value="<?= $townID ?>">
	<input class="btn btn-success" type="submit" value="<?= $atown25 ?>">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>