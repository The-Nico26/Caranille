<?php
$timeStart = microtime(true);
session_start();
ob_start();
require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

?>
<br>
	<?= $register0 ?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title"><?= $register1 ?></h3>
		</div>
		<div class="panel-body">
			<form method="POST" action="Register.php">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register2 ?></span>
				  	<input type="text" class="form-control" placeholder="<?= $register2 ?>" aria-describedby="basic-addon1" name="accountPseudo" required autofocus>
				</div>
				<hr>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register3 ?></span>
				  	<input type="password" class="form-control" placeholder="<?= $register3 ?>" aria-describedby="basic-addon1" name="accountPassword" required>
				</div>
				<hr>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register4 ?></span>
				  	<input type="password" class="form-control" placeholder="<?= $register4 ?>" aria-describedby="basic-addon1" name="accountPasswordConfirm" required>
				</div>
				<hr>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register5 ?></span>
				  	<input type="emain" class="form-control" placeholder="<?= $register5 ?>" aria-describedby="basic-addon1" name="accountEmail" required>
				</div>
				<hr>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register6 ?></span>
				  	<input type="emain" class="form-control" placeholder="<?= $register6 ?>" aria-describedby="basic-addon1" name="characterLastName" required>
				</div>
				<hr>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><?= $register7 ?></span>
				  	<input type="emain" class="form-control" placeholder="<?= $register7 ?>" aria-describedby="basic-addon1" name="characterFirstName" required>
				</div>
				<hr>
					<center><iframe src="../../LICENCE.txt"></iframe></center>
				<div class="forms-group">
				  	<span class="input-group-addon" id="basic-addon1">
					<input type="checkbox" class="input-group-addon" name="Licence" required><?= $register8 ?></span>
				</div>
				<hr>
				<center><input type="submit" name="Register" class="btn btn-success btn-lg" value="<?= $register9 ?>"></center>
			</form>
		</div>
	</div>
	
<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>