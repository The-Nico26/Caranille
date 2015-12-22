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

$parchmentID = htmlspecialchars(addslashes($_POST['parchmentID']));

$parchment = newItem($bdd, $parchmentID);
$parchmentPicture = $parchment->getPicture();
$parchmentLevel = $parchment->getLevel();
$parchmentName = $parchment->getName();
$parchmentDescription = $parchment->getDescription();
$parchmentHP = $parchment->getHP();
$parchmentMP = $parchment->getMP();
$parchmentStrength = $parchment->getStrength();
$parchmentMagic = $parchment->getMagic();
$parchmentAgility = $parchment->getAgility();
$parchmentDefense = $parchment->getDefense();
$parchmentWisdom = $parchment->getSagesse();
$parchmentPurchase = $parchment->getPurchase();
$parchmentPurchase = $parchment->getPurchase();
$parchmentSale = $parchment->getSale(); ?>
	
<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $aparchment6 ?><br> <input class="form-control" type="text" name="parchmentPicture" value="<?= $parchmentPicture ?>" required autofocus><br>
			<?= $aparchment7 ?><br> <input class="form-control" type="number" name="parchmentLevel" value="<?= $parchmentLevel ?>" required><br>
			<?= $aparchment8 ?><br> <input class="form-control" type="text" name="parchmentName" value="<?= $parchmentName ?>" required><br>
			<?= $aparchment9 ?><br> <textarea class="form-control" name="parchmentDescription" required><?= $parchmentDescription ?></textarea><br>
			<?= $aparchment10 ?><br> <input class="form-control" type="number" name="parchmentHP" value="<?= $parchmentHP ?>" required><br>
			<?= $aparchment11 ?><br> <input class="form-control" type="number" name="parchmentMP" value="<?= $parchmentMP ?>" required><br>
			<?= $aparchment12 ?><br> <input class="form-control" type="number" name="parchmentStrength" value="<?= $parchmentStrength ?>" required><br>
			<?= $aparchment13 ?><br> <input class="form-control" type="number" name="parchmentMagic" value="<?= $parchmentMagic ?>" required><br>
			<?= $aparchment14 ?><br> <input class="form-control" type="number" name="parchmentAgility" value="<?= $parchmentAgility ?>" required><br>
			<?= $aparchment15 ?><br> <input class="form-control" type="number" name="parchmentDefense" value="<?= $parchmentDefense ?>" required><br>
			<?= $aparchment16 ?><br> <input class="form-control" type="number" name="parchmentWisdom" value="<?= $parchmentWisdom ?>" required><br>
			<?= $aparchment17 ?><br> <input class="form-control" type="number" name="parchmentPurchase" value="<?= $parchmentPurchase ?>" required><br>
			<?= $aparchment18 ?><br> <input class="form-control" type="number" name="parchmentSale" value="<?= $parchmentSale ?>" required><br>
			<input type="hidden" name="parchmentID" value="<?= $parchmentID ?>">
			<input class="btn btn-success" type="submit" name="add" value="<?= $aparchment19 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
