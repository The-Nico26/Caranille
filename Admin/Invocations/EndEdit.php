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

$invocationID = htmlspecialchars(addslashes($_POST['invocationID']));
$invocationImage = htmlspecialchars(addslashes($_POST['invocationImage']));
$invocationName = htmlspecialchars(addslashes($_POST['invocationName']));
$invocationDescription = htmlspecialchars(addslashes($_POST['invocationDescription']));
$invocationDamage = htmlspecialchars(addslashes($_POST['invocationDamage']));
$invocationPrice = htmlspecialchars(addslashes($_POST['invocationPrice']));
	
updateInvocation($bdd, $invocationID, $invocationImage, $invocationName, $invocationDescription, $invocationDamage, $invocationPrice); ?>

<?= $ainvocation11 ?>

<br>
<form method="POST" action="index.php">
	<input type="hidden" name="townID" value="<?= $townID ?>">
	<input class="btn btn-success" type="submit" value="<?= $atown25 ?>">
</form>
<br/>
	
<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>