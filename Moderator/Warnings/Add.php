<?php
$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasModerator($accountAccess);

$playerID = htmlspecialchars(addslashes($_POST['playerID']));
$warningType = htmlspecialchars(addslashes($_POST['warningType']));
$warningMessage = htmlspecialchars(addslashes($_POST['warningMessage']));
addWarning($bdd, $playerID, $accountID, $warningType, $warningMessage); ?>

<?= $mwarning6 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>