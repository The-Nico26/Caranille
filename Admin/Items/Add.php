<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndAdd.php">
			<?= $aitem6 ?><br> <input class="form-control" type="text" name="itemPicture" placeholder="<?= $aitem6 ?>" required autofocus><br>
			<?= $aitem7 ?><br> <select name="itemType" class="form-control">
				<option value="<?= $itemType ?>" selected></option>
				<option value="Magic"><?= $aitem8 ?></option>
				<option value="Health"><?= $aitem9 ?></option>
				</select><br>
			<?= $aitem10 ?><br> <input class="form-control" type="number" name="itemLevel" value="0" required><br>
			<?= $aitem11 ?><br> <input class="form-control" type="text" name="itemName" placeholder="0" required><br>
			<?= $aitem12 ?><br> <textarea class="form-control" name="itemDescription" placeholder="<?= $aitem12 ?>" required></textarea><br>
			<?= $aitem13 ?><br> <input class="form-control" type="number" name="itemHP" value="0" required><br>
			<?= $aitem14 ?><br> <input class="form-control" type="number" name="itemMP" value="0" required><br>
			<?= $aitem15 ?><br> <input class="form-control" type="number" name="itemPurchase" value="0" required><br>
			<?= $aitem16 ?><br> <input class="form-control" type="number" name="itemSale" value="0" required><br>
			<input class="btn btn-success" type="submit" value="<?= $aitem17 ?>">
		</form>
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
