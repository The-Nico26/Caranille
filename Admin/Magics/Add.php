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
	<div class="panel-heading">
		<h3 class="panel-title"><?= $amagics19 ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="EndAdd.php">
			<?= $amagics6 ?><br> <input class="form-control" type="text" name="magicPicture" placeholder="<?= $amagics6 ?>" required autofocus><br>
			<?= $amagics7 ?><br> <input class="form-control" type="text" name="magicName" placeholder="<?= $amagics7 ?>" required><br>
			<?= $amagics8 ?><br> <textarea class="form-control" name="magicDescription" rows="10" cols="50" placeholder="<?= $amagics8 ?>" required></textarea><br>
			<?= $amagics9 ?><br>
			<select name="magicType" class="form-control">
				<option value="Health"><?= $amagics10 ?></option>
				<option value="Attack"><?= $amagics11 ?></option>
			</select>
			<br>
			<?= $amagics12 ?><br> <input class="form-control" type="number" name="magicEffect" value="0" required><br>
			<?= $amagics13 ?><br> <input class="form-control" type="number" name="magicMPCost" value="0" required><br>
			<?= $amagics14 ?><br> <input class="form-control" type="number" name="magicPrice" value="0" required><br>
			<input type="submit" class="btn btn-success" name="End_Add" value="<?= $amagics20 ?>"><br /><br />
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>