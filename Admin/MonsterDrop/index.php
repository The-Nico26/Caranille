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
$monsterID = $_POST['monsterID']; ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="Add.php">
			<?= $amonsterDrop0 ?>
			<?php showAllItemsList($bdd); echo '<br>'; showAllEquipmentsList($bdd); ?>
			<br><?= $amonsterDrop1 ?>
			<input type="number" placeholder="(0-1000)" class="form-control" name="luck" required>
			<input type="hidden" value="<?= $monsterID ?>" name="monsterID">
			<input class="btn btn-success" type="submit" value="<?= $amonsterDrop2 ?>">
		</form>
		<?php showMonsterDrops($bdd, $monsterID) ?>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
