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
		<div class="important"><?= $aindex0 ?></div><br>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Accounts/index.php'; ?>"><?= $aindex1 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Configuration/index.php'; ?>"><?= $aindex2 ?></a><br><br>
		<div class="important"><?= $aindex3 ?></div><br>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root']."/Admin/Story/index.php"; ?>"><?= $aindex4 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root']."/Admin/Invocations/index.php"; ?>"><?= $aindex5 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root']."/Admin/Equipments/index.php"; ?>"><?= $aindex6 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Magics/index.php'; ?>"><?= $aindex7 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Missions/index.php'; ?>"><?= $aindex8 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Monsters/index.php'; ?>"><?= $aindex9 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/News/index.php'; ?>"><?= $aindex10 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Items/index.php'; ?>"><?= $aindex11 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Parchments/index.php'; ?>"><?= $aindex12 ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Towns/index.php'; ?>"><?= $aindex13 ?></a><br><br>
		<div class="important"><?= $aindex14 ?></div><br>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'].'/Admin/Modules/Design.php'; ?>"><?= $aindex15 ?></a>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
