<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasModerator($accountAccess);

?>
<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="important"><?= $mindex0 ?></div><br>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'] ."/Moderator/Sanctions/index.php"; ?>"><?php echo $mindex1; ?></a>
		<a class="btn btn-info" href="<?php echo $_SESSION['Link_Root'] ."/Moderator/Warnings/index.php"; ?>"><?php echo $mindex2; ?></a>
	</div>
</div>
<?php
require_once $_SESSION['File_Root'] .'/HTML/Footer.php';
?>
