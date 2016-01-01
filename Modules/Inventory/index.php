<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title"></h3>
	</div>
	<div class="panel-body">
		<?= $inventory0 ?>
		<form method="POST" action="Weapon.php">
			<div class="row" style="text-align:center;">
				<div class="col-lg-4">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory1 ?>">
					</form>
					<form method="POST" action="Armor.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory2 ?>">
					</form>
					<form method="POST" action="Boots.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory3 ?>">
					</form>
				</div>
				<div class="col-lg-4">
					<form method="POST" action="Helmet.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory4 ?>">
					</form>
					<form method="POST" action="Invocation.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory5 ?>">
					</form>
					<form method="POST" action="Gloves.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory6 ?>">
					</form>
				</div>
				<div class="col-lg-4">
					<form method="POST" action="Magic.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory7 ?>">
					</form>
					<form method="POST" action="Item.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory8 ?>">
					</form>
					<form method="POST" action="Parchment.php">
					<input type="submit" class="btn btn-default form-control" value="<?= $inventory9 ?>">
				</div>
			</div>
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
