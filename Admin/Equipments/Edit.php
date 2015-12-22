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

$equipmentID = htmlspecialchars(addslashes($_POST['equipmentID']));

$equipment = newEquipment($bdd, $equipmentID);
$equipmentImage = $equipment->getPicture();
$equipmentType = $equipment->getType();
$equipmentLevel = $equipment->getLevel();
$equipmentName = $equipment->getName();
$equipmentDescription = $equipment->getDescription();
$equipmentHP = $equipment->getHP();
$equipmentMP = $equipment->getMP();
$equipmentStrength = $equipment->getStrength();
$equipmentMagic = $equipment->getMagic();
$equipmentAgility = $equipment->getAgility();
$equipmentDefense = $equipment->getDefense();
$equipmentSagesse = $equipment->getSagesse();
$equipmentPurchase = $equipment->getPurchase();
$equipmentSale = $equipment->getSale(); ?>
	
<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $aequipment6 ?><br> <input class="form-control" type="text" name="equipmentImage" placeholder="<?= $aequipment6 ?>" value="<?= $equipmentImage ?>" required autofocus><br>
			<?= $aequipment7 ?><br> <select name="equipmentType" class="form-control">
				<option value="<?= $equipmentType ?>" selected><?= $equipmentType ?></option>
				<option value="Armor">Armor</option>
				<option value="Gloves">Gloves</option>
				<option value="Helmet">Helmet</option>
				<option value="Weapon">Weapon</option>
				<option value="Boots">Boots</option>
				</select><br>
			<?= $aequipment11 ?><br> <input class="form-control" type="number" name="equipmentLevel" value="<?= $equipmentLevel ?>" required><br>
			<?= $aequipment12 ?><br> <input class="form-control" type="text" name="equipmentName" placeholder="<?= $aequipment12 ?>" value="<?= $equipmentName ?>" required><br>
			<?= $aequipment13 ?><br> <textarea class="form-control" name="equipmentDescription" placeholder="<?= $aequipment13 ?>" required>$equipmentDescription</textarea><br>
			<?= $aequipment14 ?><br> <input class="form-control" type="number" name="equipmentHP" value="<?= $equipmentHP ?>" required><br>
			<?= $aequipment15 ?><br> <input class="form-control" type="number" name="equipmentMP" value="<?= $equipmentMP ?>" required><br>
			<?= $aequipment16 ?><br> <input class="form-control" type="number" name="equipmentStrength" value="<?= $equipmentStrength ?>" required><br>
			<?= $aequipment17 ?><br> <input class="form-control" type="number" name="equipmentMagic" value="<?= $equipmentMagic ?>" required><br>
			<?= $aequipment18 ?><br> <input class="form-control" type="number" name="equipmentAgility" value="<?= $equipmentAgility ?>" required><br>
			<?= $aequipment19 ?><br> <input class="form-control" type="number" name="equipmentDefense" value="<?= $equipmentDefense ?>" required><br>
			<?= $aequipment20 ?><br> <input class="form-control" type="number" name="equipmentSagesse" value="<?= $equipmentSagesse ?>" required><br>
			<?= $aequipment22 ?><br> <input class="form-control" type="number" name="equipmentPurchase" value="<?= $equipmentPurchase ?>" required><br>
			<?= $aequipment23 ?><br> <input class="form-control" type="number" name="equipmentSale" value="<?= $equipmentSale ?>" required><br>
			<input type="hidden" name="equipmentID" value="<?= $equipmentID ?>">
			<input class="btn btn-success" type="submit" value="<?= $aequipment24 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>