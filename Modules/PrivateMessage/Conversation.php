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

$parentID = htmlspecialchars(addslashes($_POST['parentID'])); ?>

<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="Answer.php">
			<?php showConversation($bdd, $parentID, $accountID) ?>
			<?= $messageprivate5 ?><br/><textarea class="form-control" type="text" rows="5" name="message" placeholder="Message"></textarea><hr>
			<center><input type="submit" class="btn btn-success" value="<?= $messageprivate7 ?>"></center>
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>