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

$magicID = htmlspecialchars(addslashes($_POST['magicID']));
$magic = newMagic($bdd, $magicID); ?>

<div class="panel panel-warning">
	<div class="panel-heading">
		<img src="<?= $monsterPicture ?>" alt="">
	</div>
	<div class="panel-body">
	<?php

		if ($characterMP >= $magic->getMPCost())
		{
			$magicEffect = round($magic->getEffect() + $characterMagic / 100);
		
			if ($totalDamageMonster <= 0) 
		    {
		        $totalDamageMonster = 0;
		    }
		
		    if ($magicEffect <= 0) 
		    {
		        $magicEffect = 0;
		    }
		
			if ($magic->getType() == "Health")
			{
		    	$characterHP += $magicEffect - $totalDamageMonster;
		    	echo "$battle29 $magicEffect<br>";
		    	
				if ($characterHP > $characterHPMax)
				{
					$characterHP = $characterHPMax;	
				}
			}
			elseif ($magic->getType() == "Attack")
			{
				$characterHP -= $totalDamageMonster;
				$monsterHP -= $magicEffect;
				echo "$battle17 $magicEffect<br>";
			}
			
			$characterMP = $characterMP - $magic->getMPCost();
			
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