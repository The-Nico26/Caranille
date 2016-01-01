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

$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));

$monster = newMonster($bdd, $monsterID);

$monsterImage = $monster->getPicture();
$monsterName = $monster->getName();
$monsterDescription =  $monster->getDescription();
$monsterLevel =  $monster->getLevel();
$monsterStrength =  $monster->getStrength();
$monsterDefense =  $monster->getDefense();
$monsterHP =  $monster->getHP();
$monsterMP =  $monster->getMP();
$monsterMagic =  $monster->getMagic();
$monsterAgility =  $monster->getAgility();
$monsterExperience =  $monster->getExperience();
$monsterGolds =  $monster->getGold(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $amonster6 ?><br> <input class="form-control" type="text" name="monsterImage" value="<?= $monsterImage ?>" placeholder="<?= $amonster6 ?>" required autofocus><br>
			<?= $amonster7 ?><br> <input class="form-control" type="text" name="monsterName" value="<?= $monsterName ?>" placeholder="<?= $amonster7 ?>" required><br>
			<?= $amonster8 ?><br> <textarea class="form-control" name="monsterDescription" placeholder="<?= $amonster8 ?>" required><?= $monsterDescription ?></textarea><br>
			<?= $amonster9 ?><br> <input class="form-control" type="number" name="monsterLevel" value="<?= $monsterLevel ?>" required><br>
			<?= $amonster10 ?><br> <input class="form-control" type="number" name="monsterStrength" value="<?= $monsterStrength ?>" required><br>
			<?= $amonster11 ?><br> <input class="form-control" type="number" name="monsterDefense" value="<?= $monsterDefense ?>" required><br>
			<?= $amonster12 ?><br> <input class="form-control" type="number" name="monsterHP" value="<?= $monsterHP ?>" required><br>
			<?= $amonster13 ?><br> <input class="form-control" type="number" name="monsterMP" value="<?= $monsterMP ?>" required><br>
			<?= $amonster14 ?><br> <input class="form-control" type="number" name="monsterMagic" value="<?= $monsterMagic ?>" required><br>
			<?= $amonster15 ?><br> <input class="form-control" type="number" name="monsterAgility" value="<?= $monsterAgility ?>" required><br>
			<?= $amonster16 ?><br> <input class="form-control" type="number" name="monsterExperience" value="<?= $monsterExperience ?>" required><br>
			<?= $amonster17 ?><br> <input class="form-control" type="number" name="monsterGolds" value="<?= $monsterGolds ?>" required><br>
			<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
			<input class="btn btn-success" type="submit" name="edit" value="<?= $amonster18 ?>">
		</form>
	</div>
</div>
	
<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
