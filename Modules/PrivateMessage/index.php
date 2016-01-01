<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot); ?>

<div class="panel panel-warning">
	<div class="panel-heading">
		<form method="POST" action="Add.php">
			<input type="submit" name="add" class="btn btn-success" value="<?= $messageprivate3 ?>">
		</form>
	</div>
	<div class="panel-body">
		<?php showMessagePrivate($bdd, $accountID) ?>
	</div>
</div>
	
<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>