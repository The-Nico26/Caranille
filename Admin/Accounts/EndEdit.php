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

$accountID = htmlspecialchars(addslashes($_POST['accountID']));
$accountPseudo = htmlspecialchars(addslashes($_POST['accountPseudo']));
$accountEmail = htmlspecialchars(addslashes($_POST['accountEmail']));
$accountAccess =  htmlspecialchars(addslashes($_POST['accountAccess']));

updateAccount($bdd, $accountPseudo, $accountEmail, $accountAccess, $accountID) ?>

<br>
<form method="POST" action="index.php">
	<input class="btn btn-success" type="submit" value="Ok">
</form>
<br/>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>