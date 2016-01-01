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
	$battle = findBattle($bdd, $characterID); ?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-2">
					<img src="$monsterPicture" alt="">
				</div>
				<div class="col-lg-9">
					<h3 class="panel-title"><?= $battle0.' '. $monsterName. ' '. $battle1.' '. $characterLastName.' '.$characterFirstName; ?></h3>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<?php
		    if ($monsterHP <= 0) 
		    {
		        addExperience($bdd, $monsterExperience, $monsterGold, $characterID);
		       	deleteMonsterBattle($bdd, $battle['Battle_List_ID']);
		        echo "$battle31<br />$monsterExperience $battle32<br />$monsterGold $battle33<br /><br />";
		        addDrop($bdd, $monsterID, $characterID);
		        
		        if($battle['Battle_List_Type'] == "Chapter")
		        {
					showChapterReward($bdd, $battle['Battle_List_Character_ID'], $battle['Battle_List_Chapter_ID']);
		        }
		        else if($battle['Battle_List_Type'] == "Mission")
		        {
					showMissionReward($bdd, $battle['Battle_List_Character_ID'], $battle['Battle_List_Mission_ID']);
		        }
		        ?>
		        <br>
				<form method="POST" action="index.php">
					<input class="btn btn-success" type="submit" value="Ok">
				</form>
				<br/>
				<?php return;
		    }
		    if ($characterHP <= 0) 
		    {
		    	echo "$battle36";
		        useINN($bdd, $townPriceInn, $characterID);
		        deleteMonsterBattle($bdd, $battle['Battle_List_ID']); ?>
		        <br>
				<form method="POST" action="index.php">
					<input class="btn btn-success" type="submit" value="Ok">
				</form>
				<br/>
				<?php return;
		    }
		    ?>
			<?= $battle2. ' '. $monsterName. ' '. $monsterHP; ?> HP<br>
			<?= $battle3. ' '. $characterHP; ?> HP<hr>
		   	<form method="POST" action="Attack.php">
		   		<input type="submit" name="Attack" class="btn btn-success" value="<?= $battle5 ?>"><br>
		   	</form>
		    
		    <form method="POST" action="Magic.php">
		    	<input type="submit" name="Magic" class="btn btn-success" value="<?= $battle6 ?>"><br>
		    </form>
		    
		    <form method="POST" action="Invocation.php">
				<input type="submit" name="Invocations" class="btn btn-success" value="<?= $battle7 ?>"><br>
			</form>
		    
		    <form method="POST" action="Item.php">
		    	<input type="submit" name="Items" class="btn btn-success" value="<?= $battle8 ?>"><br />
		    </form>
		    
		    <form method="POST" action="Escape.php">
		   		<input type="submit" name="Escape" class="btn btn-success" value="<?= $battle9 ?>"><br />
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
