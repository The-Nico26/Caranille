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
		<?= $aparchment6 ?><br> <input class="form-control" type="text" name="parchmentPicture" placeholder="<?= $aparchment6 ?>" required autofocus><br>
		<?= $aparchment7 ?><br> <input class="form-control" type="number" name="parchmentLevel" value="0" required><br>
		<?= $aparchment8 ?><br> <input class="form-control" type="text" name="parchmentName" placeholder="<?= $aparchment8 ?>" required><br>
		<?= $aparchment9 ?><br> <textarea class="form-control" name="parchmentDescription" placeholder="<?= $aparchment9 ?>" required></textarea><br>
		<?= $aparchment10 ?><br> <input class="form-control" type="number" name="parchmentHP" value="0" required><br>
		<?= $aparchment11 ?><br> <input class="form-control" type="number" name="parchmentMP" value="0" required><br>
		<?= $aparchment12 ?><br> <input class="form-control" type="number" name="parchmentStrength" value="0" required><br>
		<?= $aparchment13 ?><br> <input class="form-control" type="number" name="parchmentMagic" value="0" required><br>
		<?= $aparchment14 ?><br> <input class="form-control" type="number" name="parchmentAgility" value="0" required><br>
		<?= $aparchment15 ?><br> <input class="form-control" type="number" name="parchmentDefense" value="0" required><br>
		<?= $aparchment16 ?><br> <input class="form-control" type="number" name="parchmentWisdom" value="0" required><br>
		<?= $aparchment17 ?><br> <input class="form-control" type="number" name="parchmentPurchase" value="0" required><br>
		<?= $aparchment18 ?><br> <input class="form-control" type="number" name="parchmentSale" value="0" required><br>
		<input class="btn btn-success" type="submit" name="add" value="<?= $aparchment19 ?>">
	</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
