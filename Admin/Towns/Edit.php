<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$townID = htmlspecialchars(addslashes($_POST['townID']));

$town = newTown($bdd, $townID);

$townPicture = $town->getPicture();
$townName = $town->getName();
$townDescription =  $town->getDescription();
$townPriceInn =  $town->getPriceInn();
$townChapter =  $town->getChapter(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="End_Edit.php">
			<?= $atown7 ?><br> <input class="form-control" type="text" name="townPicture" value="<?= $townPicture ?>" placeholder="<?= $atown7 ?>" required autofocus><br>
			<?= $atown8 ?><br> <input class="form-control" type="text" name="townName" value="<?= $townName ?>" placeholder="<?= $atown8 ?>" required><br>
			<?= $atown9 ?><br><textarea class="form-control" name="townDescription" placeholder="<?= $atown9 ?>" required><?= $townDescription ?></textarea><br>
			<?= $atown10 ?><br> <input class="form-control" type="number" name="townPriceInn" value="<?= $townPriceInn ?>" required><br>	
			<?= $atown11 ?><br> <input class="form-control" type="number" name="townChapter" value="<?= $townChapter ?>" required><br>
			<input type="hidden" name="townID" value="<?= $townID ?>">
			<input class="btn btn-success" type="submit" value="$atown12 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>
