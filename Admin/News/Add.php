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
		<form method="POST" action="EndAdd.php">
			<?= $anews6 ?><br> <input class="form-control" type="text" name="newsTitle" placeholder="<?= $anews6 ?>" required autofocus><br>
			<?= $anews7 ?><br> <textarea class="form-control" name="newsMessage" placeholder="<?= $anews7 ?>"  required></textarea><br>
			<?= $anews8 ?><br> <input class="form-control" type="text"  name="newsAccountPseudo" value="<?= $accountPseudo ?>" readonly><br>
			<input class="btn btn-success" type="submit" value="<?= $anews14 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>