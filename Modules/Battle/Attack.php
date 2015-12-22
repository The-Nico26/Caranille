<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);

if (isset($monster)) 
{
    $battle = findBattle($bdd, $characterID);

    if ($totalDamageMonster <= 0) 
    {
        $totalDamageMonster = 0;
    }

    if ($totalDamagePlayer <= 0) 
    {
        $totalDamagePlayer = 0;
    }

    $monsterHP -= $totalDamagePlayer;
    $characterHP -= $totalDamageMonster;
    
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
    $battle['Battle_List_ID']);	?>
    
	<br>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<img src="$monsterPicture" alt="">
			</div>
			<div class="panel-body">
				<?= $battle10. ' '. $totalDamagePlayer; ?><br>
				<?= $battle11. ' '. $totalDamageMonster; ?><hr>
				<form method="POST" action="index.php">
				<input type="submit" class="btn btn-success" value="<?= $battle12 ?>">
    			</form>
			</div>
		</div>
	<?php
} 
else 
{
	exit(header("Location: $linkRoot/Modules/Main/index.php")); 
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
