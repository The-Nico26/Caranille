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

$monsterDropID = htmlspecialchars(addslashes($_POST['monsterDropID']));
$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));

deleteMonstersDrops($bdd, $monsterDropID); ?>

<br>
<form method="POST" action="index.php">
	<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
	<input class="btn btn-success" type="submit" value="<?= $atown17 ?>">
</form>
<br/>
	
<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>