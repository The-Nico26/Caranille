<?php
$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasModerator($accountAccess); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="Add.php">
			<?= $mwarning0 ?><br><input class="form-control" type="text" name="warningType" placeholder="<?= $mwarning0 ?>"><br>
			<?= $mwarning1 ?><br><input class="form-control" type="text" name="warningMessage" placeholder="<?= $mwarning1 ?>"><br>
			<?= $mwarning2 ?><br>
			<?php showPlayerWarning($bdd) ?>
			<br>
			<input class="btn btn-success" type="submit" value="<?= $mwarning3 ?>">
		</form>
		<hr>
		<?php showPlayerWarningList($bdd) ?>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
