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

if ($townID == 0) 
{
	?>
	<br>
		<div class="panel panel-warning">
			<div class="panel-heading"></div>
			<div class="panel-body">
			    <?= $map0 ?>
				<hr>
			    <?php ShowTownsList($bdd, $characterChapter); ?>
	    	</div>
	   </div>
	<?php    	   
} 
else 
{
	exit(header("Location: $linkRoot/Modules/Town/index.php")); 
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
