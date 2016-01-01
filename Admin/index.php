<?php
$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="row" style="text-align:center;">
			<div class="col-lg-4">
			<div class="important"><?= $aindex0 ?></div><br>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Accounts/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex1 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Configuration/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex2 ?>">
				</form>
			</div>
			<div class="col-lg-4">
			<div class="important"><?= $aindex3 ?></div><br>
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/Story/index.php"; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex4 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Invocations/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex5 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Equipments/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex6 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Magics/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex7 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Missions/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex8 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Monsters/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex9 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/News/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex10 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Items/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex11 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Parchments/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex12 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Admin/Towns/index.php'; ?>">
				<input type="submit" class="btn btn-default form-control" value="<?= $aindex13 ?>">
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
