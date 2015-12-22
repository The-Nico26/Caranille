<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title"><?= $inventory30 ?></h3>
	</div>
	<div class="panel-body">
		<?php showAllEquipments($bdd, $characterID, "Gloves"); ?>
	</div>
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
