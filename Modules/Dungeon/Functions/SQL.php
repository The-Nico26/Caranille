<?php
//INSERT
function addMonsterBattle($bdd, $battleID, $monsterID, $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHP, $monsterMP, $monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold)
{
	$addMonster = $bdd->prepare("INSERT INTO Caranille_Battles_Monsters VALUES(
	:BattleID,
	:MonsterID,
	:MonsterPicture,
	:MonsterName,
	:MonsterDescription,
	:MonsterLevel,
	:MonsterHP,
	:MonsterMP,
	:MonsterStrength,
	:MonsterMagic,
	:MonsterAgility,
	:MonsterDefense,
	:MonsterExperience,
	:MonsterGold)");
	
	$addMonster->execute([
	'BattleID' => $battleID,
	'MonsterID' => $monsterID,
	'MonsterPicture' => $monsterPicture,
	'MonsterName' => $monsterName,
	'MonsterDescription' => $monsterDescription,
	'MonsterLevel' => $monsterLevel,
	'MonsterHP' => $monsterHP,
	'MonsterMP' => $monsterMP,
	'MonsterStrength' => $monsterStrength,
	'MonsterMagic' => $monsterMagic,
	'MonsterAgility' => $monsterAgility,
	'MonsterDefense' => $monsterDefense,
	'MonsterExperience' => $monsterExperience,
	'MonsterGold' => $monsterGold,]);
	$addMonster->closeCursor();
}

function addBattle($bdd, $characterID, $chapterID, $missionID, $battleType)
{
    $addBattle = $bdd->prepare("INSERT INTO Caranille_Battles_List VALUES(
    '',
    :Character_ID,
    :Chapter_ID,
    :Mission_ID,
    :Battle_Type)");
    $addBattle->execute([
    'Character_ID' => $characterID,
    'Chapter_ID' => $chapterID,
    'Mission_ID' => $missionID,
    'Battle_Type' => $battleType,]);
    $addBattle->closeCursor();
}

//SELECT
function showBattleMonsters($bdd, $townID, $monsterType)
{
	global $dungeon1;
    $monsterListQuery = $bdd->prepare('SELECT * FROM Caranille_Towns_Monsters
    WHERE Town_Monster_Town_ID = ?');
    $monsterListQuery->execute([$townID]);
    while ($monsterList = $monsterListQuery->fetch()) 
    {
        $monsterID = stripslashes($monsterList['Town_Monster_Monster_ID']);
        $monster = newMonster($bdd, $monsterID);
        $monsterPicture = stripslashes($monster->getPicture());
        ?>
        <br>
    	<div class="panel panel-warning">
    		<div class="panel-heading">
    			<div class="row">
    				<div class="col-lg-2">
    					<img src="$monsterPicture" alt="">
    				</div>
    				<div class="col-lg-10">
    					<?php
    					echo "<h3 class=\"panel-title\">" .stripslashes($monster->getName()).'</h3>' .stripslashes(nl2br($monster->getDescription())); ?>
    				</div>
    			</div>
    		</div>
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-lg-2">
    				<?php
    					echo "Niveau: ".stripslashes($monster->getLevel())."<br> HP: ".stripslashes($monster->getHP())."<br>MP: ".stripslashes($monster->getMP()); ?>
	        		</div>
	        		<div class="col-lg-10">
		    			<form method="POST" action="Dungeon.php">
		        			<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
		        			<input type="submit" class="btn btn-success" name="Battle" value="<?= $dungeon1 ?>">
		        		</form>
        			</div>
        		</div>
        	</div>
        </div> <hr>
        <?php
    }
    $monsterListQuery->closeCursor();
}

function findBattle($bdd, $characterID)
{
    $idBattleQuery = $bdd->prepare('SELECT * FROM Caranille_Battles_List 
    WHERE Battle_List_Character_ID = ?');
    $idBattleQuery->execute([$characterID]);
    while ($idBattle = $idBattleQuery->fetch()) 
    {
        $Battle = $idBattle;
    }
    $idBattleQuery->closeCursor();
    return $Battle;
}

function previewBattle($bdd, $monsterID)
{
    $monsterListQuery = $bdd->prepare('SELECT * FROM Caranille_Monsters
	WHERE Monster_ID = ?');
    $monsterListQuery->execute([$monsterID]);
    while ($monsterList = $monsterListQuery->fetch()) 
    {
        $monster = new Monster(
        $monsterList['Monster_ID'],
        $monsterList['Monster_Picture'],
        $monsterList['Monster_Name'],
        $monsterList['Monster_Description'],
        $monsterList['Monster_Level'],
        $monsterList['Monster_HP'],
        $monsterList['Monster_MP'],
        $monsterList['Monster_Strength'],
        $monsterList['Monster_Magic'],
        $monsterList['Monster_Agility'],
        $monsterList['Monster_Defense'],
        $monsterList['Monster_Experience'],
        $monsterList['Monster_Gold']);
    }
    $monsterListQuery->closeCursor();
    return $monster;
}