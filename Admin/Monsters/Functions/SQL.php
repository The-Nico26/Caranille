<?php
//DELETE
function deleteMonster($bdd, $monsterId)
{
	$deleteMonster = $bdd->prepare('DELETE FROM Caranille_Monsters 
	WHERE Monster_ID = ?');
    $deleteMonster->execute([$monsterId]);
    $deleteMonster->closeCursor();
}

//INSERT
function addMonster($bdd, $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHP, $monsterMP, $monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold)
{
	$addMonster = $bdd->prepare("INSERT INTO Caranille_Monsters VALUES(
	'',
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
	'MonsterGold' => $monsterGold]);
	$addMonster->closeCursor();
}

//SELECT
function showAllMonsters($bdd)
{
	global $amonster3, $amonster4, $amonster5, $amonster22;
	
    foreach($bdd->query("SELECT * FROM Caranille_Monsters") as $monsterList)
    {
        $monsterID = stripslashes($monsterList['Monster_ID']); ?>
        <?= $amonster3 ?> : <b> <?= stripslashes($monsterList['Monster_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amonster4 ?>">
    	</form>
    	<form method="POST" action="../MonsterDrop/index.php">
    		<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amonster22 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amonster5 ?>">
    	</form>
        <hr>
        <?php
    }
}

//UPDATE
function updateMonster($bdd, $monsterID, $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHp, $monsterMp, $monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold)
{
    $updateMonster = $bdd->prepare('UPDATE Caranille_Monsters
    SET Monster_Picture = :Monster_Picture,
    Monster_Name = :Monster_Name,
    Monster_Description = :Monster_Description,
    Monster_Level = :Monster_Level,
    Monster_HP = :Monster_HP,
    Monster_MP = :Monster_MP,
    Monster_Strength = :Monster_Strength,
    Monster_Magic = :Monster_Magic,
    Monster_agility = :Monster_Agility,
    Monster_Defense = :Monster_Defense,
    Monster_Experience = :Monster_Experience,
    Monster_Gold = :Monster_Gold
    WHERE Monster_ID = :Monster_ID');

    $updateMonster->execute([
    'Monster_ID' => $monsterID,
    'Monster_Picture' => $monsterPicture,
    'Monster_Name' => $monsterName,
    'Monster_Description' => $monsterDescription,
    'Monster_Level' => $monsterLevel,
    'Monster_HP' => $monsterHp,
    'Monster_MP' => $monsterMp,
    'Monster_Strength' => $monsterStrength,
    'Monster_Magic' => $monsterMagic,
    'Monster_Agility' => $monsterAgility,
    'Monster_Defense' => $monsterDefense,
    'Monster_Experience' => $monsterExperience,
    'Monster_Gold' => $monsterGold]);

    $updateMonster->closeCursor();
}