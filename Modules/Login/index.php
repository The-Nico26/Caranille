<?php
$timeStart = microtime(true);
session_start();
ob_start();
require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

?>
<br>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title"><?= $login0 ?></h3>
		</div>
		<div class="panel-body">
			<form method="POST" action="Login.php">
				<div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1"><?= $login1 ?></span>
				  	<input type="text" class="form-control" placeholder="<?= $login1 ?>" aria-describedby="basic-addon1" name="accountPseudo" required autofocus>
				</div>
				<hr>
				<div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1"><?= $login2 ?></span>
				  	<input type="password" class="form-control" placeholder="<?= $login2 ?>" aria-describedby="basic-addon1" name="accountPassword" required>
				</div>
				<hr>
				<input type="submit" name="Login" class="btn btn-success" value="<?= $login3 ?>">
			</form>
		</div>
	</div>

<?php
require_once $_SESSION['File_Root'].'/HTML/Footer.php';
