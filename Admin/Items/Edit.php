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

$itemID = htmlspecialchars(addslashes($_POST['itemID']));

$item = newItem($bdd, $itemID);
$itemImage = $item->getPicture();
$itemType = $item->getType();
$itemLevel = $item->getLevel();
$itemName = $item->getName();
$itemDescription = $item->getDescription();
$itemHP = $item->getHP();
$itemMP = $item->getMP();
$itemPurchase = $item->getPurchase();
$itemSale = $item->getSale(); ?>
	
<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $aitem6 ?><br> <input class="form-control" type="text" name="itemPicture" value="<?= $itemImage ?>" required autofocus><br>
			<?= $aitem7 ?><br> <select name="itemType" class="form-control">
				<option value="<?= $itemType ?>" selected><?= $itemType ?></option>
				<option value="Magic"><?= $aitem8 ?></option>
				<option value="Health"><?= $aitem9 ?></option>
				</select><br>
			<?= $aitem10 ?><br> <input class="form-control" type="number" name="itemLevel" value="<?= $itemLevel ?>" required><br>
			<?= $aitem11 ?><br> <input class="form-control" type="text" name="itemName" value="<?= $itemName ?>" required><br>
			<?= $aitem12 ?><br> <textarea class="form-control" name="itemDescription" required><?= $itemDescription ?></textarea><br>
			<?= $aitem13 ?><br> <input class="form-control" type="number" name="itemHP" value="<?= $itemHP ?>" required><br>
			<?= $aitem14 ?><br> <input class="form-control" type="number" name="itemMP" value="<?= $itemMP ?>" required><br>
			<?= $aitem15 ?><br> <input class="form-control" type="number" name="itemPurchase" value="<?= $itemPurchase ?>" required><br>
			<?= $aitem16 ?><br> <input class="form-control" type="number" name="itemSale" value="<?= $itemSale ?>" required><br>
			<input type="hidden" name="itemID" value="<?= $itemID ?>">
			<input class="btn btn-success" type="submit" value="<?= $aitem17 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
