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

$townID = htmlspecialchars(addslashes($_POST['townID'])); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="Add.php">
		
			<?php showAllEquipmentsList($bdd, "0"); ?>
			
			<input type="hidden" name="townID" value="<?= $townID ?>">
			<input class="btn btn-success" type="submit" name="addEquipment" value="<?= $atown32 ?>">
		</form>
		<?php showEquipmentTown($bdd, $townID); ?>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>
