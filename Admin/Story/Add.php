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
			<?= $achapter6 ?><br> <input class="form-control" type="number" name="chapterNumber" required autofocus><br>
			<?= $achapter7 ?><br> <input class="form-control" type="text" name="chapterName" placeholder="<?= $achapter7 ?>" required><br>
			<?= $achapter8 ?><br> <textarea class="form-control" name="chapterOpening" placeholder="<?= $achapter8 ?>" required></textarea><br>
			<?= $achapter9 ?><br> <textarea class="form-control" name="chapterEnding" placeholder="<?= $achapter9 ?>" required></textarea><br>
			<?= $achapter10 ?><br> <textarea class="form-control" name="chapterDefeate" placeholder="<?= $achapter10 ?>" required></textarea><br>
			<?= $achapter11 ?><br>
			<?php showAllMonstersList($bdd, '0') ?>
			<br>
			<input class="btn btn-success" type="submit" value="<?= $achapter12 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
