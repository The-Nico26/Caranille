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

$townEquipmentID = htmlspecialchars(addslashes($_POST['townEquipmentID']));
$townID = htmlspecialchars(addslashes($_POST['townID']));

deleteEquipmentTown($bdd, $townEquipmentID); ?>

<br>
<form method="POST" action="index.php">
	<input type="hidden" name="townID" value="<?= $townID ?>">
	<input class="btn btn-success" type="submit" value="<?= $atown37 ?>">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>