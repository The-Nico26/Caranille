<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndAdd.php">
			<?= $ainvocation6 ?><br> <input class="form-control" type="text" name="invocationImage" placeholder="<?= $ainvocation6 ?>" required autofocus><br>
			<?= $ainvocation7 ?><br> <input class="form-control" type="text" name="invocationName" placeholder="<?= $ainvocation7 ?>" required><br>
			<?= $ainvocation8 ?><br> <textarea class="form-control" name="invocationDescription" placeholder="<?= $ainvocation8 ?>" required></textarea><br>
			<?= $ainvocation9 ?><br> <input class="form-control" type="number" name="invocationDamage" value="0" required><br>
			<?= $ainvocation10 ?><br> <input class="form-control" type="number" name="invocationPrice" value="0" required><br>
			<input class="btn btn-success" type="submit" value="<?= $ainvocation15 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
