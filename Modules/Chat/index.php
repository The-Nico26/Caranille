<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
?>
<br>
	<div class="panel panel-warning">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<?php showAllMessages($bdd, $accountAccess); ?>
		</div>
		<div class="panel-footer">
			<form method="POST" action="Send.php">
					<input type="text" class="form-control" placeholder="Message" name="Message" required autofocus><br />
					<input type="submit" class="btn btn-success" name="Send" value="<?= $chat3 ?>">
			</form>
			<form method="POST" action="Refresh.php">
				<input type="submit" class="btn btn-info" name="Refresh" value="<?= $chat4 ?>">
			</form>
			
			<?php
			if ($accountAccess == 2)
			{
				?>
				<form method="POST" action="Clear.php">
					<input type="submit" class="btn btn-warning" name="Clear" value="<?= $chat5 ?>">
				</form>
				<?php
			}
			?>
		</div>
	</div>
	
<?php
require_once $_SESSION['File_Root'].'/HTML/Footer.php';
