<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$magicID = htmlspecialchars(addslashes($_POST['magicID']));
$magic = newMagic($bdd, $magicID);

$magicPicture = $magic->getPicture();
$magicName = $magic->getName();
$magicDescription = $magic->getDescription();
$magicType = $magic->getType();
$magicEffect = $magic->getEffect();
$magicMPCost = $magic->getMPCost();
$magicPrice = $magic->getPrice(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title"><?= $amagics19 ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $amagics6 ?><br> <input class="form-control" type="text" name="magicPicture" placeholder="<?= $amagics6 ?>" value="<?= $magicPicture ?>" required autofocus><br>
			<?= $amagics7 ?><br> <input class="form-control" type="text" name="magicName" placeholder="<?= $amagics7 ?>" value="<?= $magicName ?>" required><br>
			<?= $amagics8 ?><br> <textarea class="form-control" name="magicDescription" rows="10" cols="50" placeholder="<?= $amagics8 ?>" required><?= $magicDescription ?></textarea><br>
			<?= $amagics9 ?><br>
			<select name="magicType" class="form-control">
			
			<?php
			if ($magicType == "Attack")
			{
				?>
				<option selected="selected" value="Attack"><?= $amagics11 ?></option>
				<option value="Health"><?= $amagics10 ?></option>
				<?php
			}
			if ($magicType == "Health")
			{
				?>
				<option selected="selected" value="Health"><?= $amagics10 ?></option>
				<option value="Attack"><?= $amagics11 ?></option>
				<?php
			}
			?>
			
			</select><br /><br />
			<?= $amagics12 ?><br> <input class="form-control" type="number" name="magicEffect" value="<?= $magicEffect ?>" required><br>
			<?= $amagics13 ?><br> <input class="form-control" type="number" name="magicMPCost"value="<?= $magicMPCost ?>" required><br>
			<?= $amagics14 ?><br> <input class="form-control" type="number" name="magicPrice" value="<?= $magicPrice ?>" required><br>
			<input type="hidden" name="magicID" value="<?= $magicID ?>">
			<input type="submit" class="btn btn-success" name="EndEdit" value="<?= $amagics4 ?>"><br /><br />
		</form>
	</div>
</div>
<br>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>