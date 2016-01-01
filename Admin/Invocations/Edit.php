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
$invocation = newInvocation($bdd, $invocationID);

$invocationImage = $invocation->getPicture();
$invocationName = $invocation->getName();
$invocationDescription =  $invocation->getDescription();
$invocationDamage =  $invocation->getDamage();
$invocationPrice =  $invocation->getPrice();?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $ainvocation6 ?><br> <input class="form-control" type="text" name="invocationImage" placeholder="<?= $ainvocation6 ?>" value="<?= $invocationImage ?>" required autofocus><br>
			<?= $ainvocation7 ?><br> <input class="form-control" type="text" name="invocationName" placeholder="<?= $ainvocation7 ?>" value="<?= $invocationName ?>" required><br>
			<?= $ainvocation8 ?><br> <textarea class="form-control" name="invocationDescription" placeholder="<?= $ainvocation8 ?>" required><?= $invocationDescription ?></textarea><br>
			<?= $ainvocation9 ?><br> <input class="form-control" type="number" name="invocationDamage" value="<?= $invocationDamage ?>" required><br>
			<?= $ainvocation10 ?><br> <input class="form-control" type="number" name="invocationPrice" value="<?= $invocationPrice ?>" required><br>
			<input type="hidden" name="invocationID" value="<?= $invocationID ?>">
			<input class="btn btn-success" type="submit" value="<?= $ainvocation4 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
