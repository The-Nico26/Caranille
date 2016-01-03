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

$luck = htmlspecialchars(addslashes($_POST['luck']));
$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));
$itemID = htmlspecialchars(addslashes($_POST['itemID']));
$equipmentID = htmlspecialchars(addslashes($_POST['equipmentID']));

if($luck > 1000)
{
	$luck = 1000;
}

if($luck < 0)
{
	$luck = 0;
}

if($itemID != 0)
	addMonsterDrops($bdd, $monsterID, $itemID, $luck, "item"); 
if($equipmentID != 0)
	addMonsterDrops($bdd, $monsterID, $equipmentID, $luck, "equipment");
?>

<?= $amonsterDrop4 ?>

<form method="POST" action="index.php">
	<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
	<input class="btn btn-success" type="submit" value="<?= $amonsterDrop5 ?>">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>