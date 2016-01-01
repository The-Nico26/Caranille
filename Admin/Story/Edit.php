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

$chapterID = $_POST['chapterID'];
$chapter = newChapter($bdd, $chapterID);

$chapterNumber = $chapter->getNumber();
$chapterName = $chapter->getName();
$chapterOpening = $chapter->getOpening();
$chapterEnding = $chapter->getEnding();
$chapterDefeate = $chapter->getDefeate();
$chapterMonster = $chapter->getMonster(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $achapter6 ?><br> <input class="form-control" type="number" name="chapterNumber" placeholder="<?= $achapter6 ?>" value="<?= $chapterNumber ?>" required autofocus><br>
			<?= $achapter7 ?><br> <input class="form-control" type="text" name="chapterName" placeholder="<?= $achapter7 ?>" value="<?= $chapterName ?>" required><br>
			<?= $achapter8 ?><br> <textarea class="form-control" name="chapterOpening" placeholder="<?= $achapter8 ?>" required><?= $chapterOpening ?></textarea><br>
			<?= $achapter9 ?><br> <textarea class="form-control" name="chapterEnding" placeholder="<?= $achapter9 ?>" required><?= $chapterEnding ?></textarea><br>
			<?= $achapter10 ?><br> <textarea class="form-control" name="chapterDefeate" placeholder="<?= $achapter10 ?>" required><?= $chapterDefeate ?></textarea><br>
			<?= $achapter11 ?><br>
			<?php showAllMonstersList($bdd, $chapterMonster) ?> 
			<input type="hidden" name="chapterID" value="<?= $chapterID ?>">
			<input class="btn btn-success" type="submit" value="<?= $achapter16 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
