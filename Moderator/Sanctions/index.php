<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

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
			<?= $msanction0 ?><br/>
			<?php showPlayerSanction($bdd) ?>
			<br>
			<?= $msanction1 ?><br><input class="form-control" type="text" name="reason" placeholder="<?= $msanction1 ?>"><br>
			<input class="btn btn-success" type="submit" value="<?= $msanction2 ?>">
		</form>
		<hr>
		<?php showPlayerSanctionList($bdd) ?>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>
