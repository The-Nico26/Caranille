<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
		<div class="panel-body">
		<?= $aaccounts0 ?><br>
		<form method="POST" action="Account.php">
			<input class="btn btn-success" type="submit" name="Edit" value="<?= $aaccounts1 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>
