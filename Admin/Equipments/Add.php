<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndAdd.php">
			<?= $aequipment6 ?><br> <input class="form-control" type="text" name="equipmentImage" placeholder="<?= $aequipment6 ?>" required autofocus><br>
			<?= $aequipment7 ?><br> <select name="equipmentType" class="form-control">
				<option value="Armor">Armor</option>
				<option value="Gloves">Gloves</option>
				<option value="Helmet">Helmet</option>
				<option value="Weapon">Weapon</option>
				<option value="Boots">Boots</option>
				</select><br>
			<?= $aequipment11 ?><br> <input class="form-control" type="number" name="equipmentLevel" value="0" required><br>
			<?= $aequipment12 ?><br> <input class="form-control" type="text" name="equipmentName" placeholder="<?= $aequipment12 ?>" required><br>
			<?= $aequipment13 ?><br> <textarea class="form-control" name="equipmentDescription" placeholder="<?= $aequipment13 ?>" required></textarea><br>
			<?= $aequipment14 ?><br> <input class="form-control" type="number" name="equipmentHP" value="0" required><br>
			<?= $aequipment15 ?><br> <input class="form-control" type="number" name="equipmentMP" value="0" required><br>
			<?= $aequipment16 ?><br> <input class="form-control" type="number" name="equipmentStrength" value="0" required><br>
			<?= $aequipment17 ?><br> <input class="form-control" type="number" name="equipmentMagic" value="0" required><br>
			<?= $aequipment18 ?><br> <input class="form-control" type="number" name="equipmentAgility" value="0" required><br>
			<?= $aequipment19 ?><br> <input class="form-control" type="number" name="equipmentDefense" value="0" required><br>
			<?= $aequipment20 ?><br> <input class="form-control" type="number" name="equipmentSagesse" value="0" required><br>
			<?= $aequipment22 ?><br> <input class="form-control" type="number" name="equipmentPurchase" value="0" required><br>
			<?= $aequipment23 ?><br> <input class="form-control" type="number" name="equipmentSale" value="0" required><br>
			<input class="btn btn-success" type="submit" name="add" value="<?= $aequipment24 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>
