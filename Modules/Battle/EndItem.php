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

$itemID = htmlspecialchars(addslashes($_POST['itemID']));
$itemQuantity = verifyItem($bdd, $characterID, $itemID);

if ($itemQuantity <= 0)
{
	
}
else
{
	$Item = newItem($bdd, $itemID); ?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<img src="<?= $monsterPicture ?>" alt="">
		</div>
		<div class="panel-body">
		<?php
			if ($totalDamageMonster <= 0) 
			{
			    $totalDamageMonster = 0;
			}
			
			if ($Item->getType() == "Health")
			{
				$ItemEffect = $Item->getHP();
				$characterHP += $ItemEffect - $totalDamageMonster;
				echo "$battle29 $ItemEffect HP<br />";
				
				if ($characterHP > $characterHPMax)
				{
					$characterHP = $characterHPMax;	
				}
			}
			elseif ($Item->getType() == "Magic")
			{
				$ItemEffect = $Item->getMP();
				$characterHP -= $totalDamageMonster;
				$monsterHP -= $ItemEffect;
				echo "$battle17 $ItemEffect MP<br />";
			}
			updateAccount($bdd, $characterHP, $characterMP, $characterID);
			deleteItem($bdd, $itemID, $characterID);
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
			$battle['Battle_List_ID']); ?>
			<?= $battle11. ' '. $totalDamageMonster; ?><hr>
			<form method="POST" action="index.php">
			<input type="submit" class="btn btn-success" name="Continue" value="<?= $battle12 ?>">
			</form>
		</div>
	</div>
	<?php
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';