<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);

$battle = findBattle($bdd, $characterID);

$invocationID = htmlspecialchars(addslashes($_POST['invocationID']));
$MPChoice = htmlspecialchars(addslashes($_POST['MPChoice']));
$invocation = newInvocation($bdd, $invocationID); ?>

<div class="panel panel-warning">
	<div class="panel-heading">
		<img src="<?= $monsterPicture ?>" alt="">
	</div>
	<div class="panel-body">
	<?php

		if ($characterMP >= $MPChoice)
		{
			$invocationDamageTotal = $invocation->getDamage() * $MPChoice;
			
			if ($totalDamageMonster <= 0) 
		    {
		        $totalDamageMonster = 0;
		    }
		
		    if ($MPChoice <= 0) 
		    {
		        $MPChoice = 0;
		    }
			$characterHP -= $totalDamageMonster;
			$monsterHP -= $invocationDamageTotal;
			
		    updateAccount($bdd, $characterHP, $characterMP, $characterID);
		
		    updateBattleMonster($bdd, 
		    $monsterID, 
		    $monsterPicture, 
		    $monsterName, 
		    $monsterDescription, 
		    $monsterLevel, 
		    $monsterHP, 
		    $monsterMP, 
		    $monsterStrength, 
		    $monsterMagic, 
		    $monsterAgility, 
		    $monsterDefense, 
		    $monsterExperience, 
		    $monsterGold, 
		    $battle['Battle_List_ID']);
			?>
		<?= $battle10. ' '. $invocationDamageTotal; ?><br>
		<?= $battle11. ' '. $totalDamageMonster; ?><hr>
		<form method="POST" action="index.php">
		<input type="submit" class="btn btn-success" name="Continue" value="<?= $battle12 ?>">
		</form>
	</div>
</div>
<?php
}
else
{
	?>
	<?= $battle18 ?>
	<form method="POST" action="index.php">
	<input type="submit" name="Continue" value="<?= $battle12 ?>">
	</form>
	<?php
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';