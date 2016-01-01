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
		<div class="panel-heading"></div>
		<div class="panel-body">
<?php
if ($characterGold >= $townPriceInn) 
{
    echo $inn3;
    useInn($bdd, $townPriceInn, $characterID);
    ?>
    <hr>
    	<form method="POST" action="<?php echo $_SESSION['Link_Root'].'/Modules/Town/index.php'; ?>">
    		<input type="submit" class="btn btn-success" value="<?= $inn4 ?>">
    	</form>
<?php
} 
else 
{
    echo $inn5;
}
?>
</div>
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
