<?php
$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasModerator($accountAccess);

$warningID = htmlspecialchars(addslashes($_POST['warningID']));
deleteWarning($bdd, $warningID); ?>

<?= $mwarning7 ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>