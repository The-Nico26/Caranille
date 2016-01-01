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

$missionID = htmlspecialchars(addslashes($_POST['missionID']));
$mission = newMission($bdd, $missionID);

$townID = $mission->getTown();
$missionNumber = $mission->getNumber();
$missionName = $mission->getName();
$missionIntroduction = $mission->getIntroduction();
$missionVictory = $mission->getVictory();
$missionDefeate = $mission->getDefeate();
$monsterID = $mission->getMonster(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $amission6 ?><br> <input class="form-control" type="number" name="missionNumber" value="<?= $missionNumber ?>" required autofocus><br>
			<?= $amission7 ?><br> <input class="form-control" type="text" name="missionName" placeholder="<?= $amission7 ?>" value="<?= $missionName ?>" required><br>
			<?= $amission8 ?><br> <textarea class="form-control" name="missionIntroduction" placeholder="<?= $amission8 ?>"required><?= $missionIntroduction ?></textarea><br>
			<?= $amission9 ?><br> <textarea class="form-control" name="missionVictory" placeholder="<?= $amission9 ?>" required><?= $missionVictory ?></textarea><br>
			<?= $amission10 ?><br> <textarea class="form-control" name="missionDefeate" placeholder="<?= $amission10 ?>" required><?= $missionDefeate ?></textarea><br>
			<?= $amission11 ?><br><?php showAlltownsList($bdd, $townID) ?><br>
			<?= $amission12 ?><br><?php showAllMonstersList($bdd, $monsterID) ?>
			
			<br>
			<input type="hidden" name="missionID" value="<?= $missionID ?>">
			<input class="btn btn-success" type="submit" value="<?= $amission17 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
