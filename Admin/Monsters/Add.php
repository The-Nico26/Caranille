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
			<?= $amonster6 ?><br> <input class="form-control" type="text" name="monsterImage" placeholder="<?= $amonster6 ?>" required autofocus><br>
			<?= $amonster7 ?><br> <input class="form-control" type="text" name="monsterName" placeholder="<?= $amonster7 ?>" required><br>
			<?= $amonster8 ?><br> <textarea class="form-control" name="monsterDescription" placeholder="<?= $amonster8 ?>" required></textarea><br>
			<?= $amonster9 ?><br> <input class="form-control" type="number" name="monsterLevel" value="0" required><br>
			<?= $amonster10 ?><br> <input class="form-control" type="number" name="monsterStrength" value="0" required><br>
			<?= $amonster11 ?><br> <input class="form-control" type="number" name="monsterDefense" value="0" required><br>
			<?= $amonster12 ?><br> <input class="form-control" type="number" name="monsterHP" value="0" required><br>
			<?= $amonster13 ?><br> <input class="form-control" type="number" name="monsterMP" value="0" required><br>
			<?= $amonster14 ?><br> <input class="form-control" type="number" name="monsterMagic" value="0" required><br>
			<?= $amonster15 ?><br> <input class="form-control" type="number" name="monsterAgility" value="0" required><br>
			<?= $amonster16 ?><br> <input class="form-control" type="number" name="monsterExperience" value="0" required><br>
			<?= $amonster17 ?><br> <input class="form-control" type="number" name="monsterGolds" value="0" required><br>
			<input class="btn btn-success" type="submit" value="<?= $amonster18 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
