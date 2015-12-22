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
			<div class="row">
				<div class="col-lg-2">
					<img src="$townPicture" alt="">
				</div>
				<div class="col-lg-10">
					<?php echo "<h3 class=\"panel-title\"> $town0 ".stripslashes($townName)."</h3>".stripslashes($townDescription). ""; ?>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<a href="<?= $_SESSION['Link_Root'].'/Modules/Dungeon/index.php' ?>"><?= $town1 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/Mission/index.php' ?>"><?= $town2 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/EquipmentShop/index.php' ?>"><?= $town4 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/MagicShop/index.php' ?>"><?= $town3 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/ItemShop/index.php' ?>"><?= $town6 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/Temple/index.php' ?>"><?= $town7 ?></a><br>
			<a href="<?= $_SESSION['Link_Root'].'/Modules/Inn/index.php' ?>"><?= $town8 ?></a><br><br>
			<form method="POST" action="Exit.php">
				<input type="submit" class="btn btn-success" value="<?= $town9 ?>">
			</form>
 		</div>
 	</div>
<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
