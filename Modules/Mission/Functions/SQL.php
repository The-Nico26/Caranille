<?php
//INSERT
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
    'Battle_Type' => $battleType]);
    $addBattle->closeCursor();
}

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

//SELECT
function showMission($bdd, $characterID, $townID)
{
	global $mission0;
	$Mission_Level_Query = $bdd->prepare('SELECT * FROM Caranille_Missions, Caranille_Missions_Successful
	WHERE Mission_ID = Mission_Successful_Mission_ID
	AND Mission_Successful_Character_ID= ?
	AND Mission_Town= ?
	ORDER BY Mission_Number DESC 
	LIMIT 0,1');
	$Mission_Level_Query->execute(array($characterID, $townID));
	
	$Mission_Number = $Mission_Level_Query->rowCount();
	if ($Mission_Number >= 1)
	{
		while ($Mission_Level = $Mission_Level_Query->fetch())
		{
			$Mission_Number = htmlspecialchars(addslashes($Mission_Level['Mission_Number']));
			$Mission_Number = htmlspecialchars(addslashes($Mission_Number)) +1;

			$Mission_Query = $bdd->prepare("SELECT * FROM Caranille_Missions
			WHERE Mission_Number= ?
			AND Mission_Town= ?");
			$Mission_Query->execute(array($Mission_Number, $townID));
			while ($Mission = $Mission_Query->fetch())
			{
				echo 'N° ' .stripslashes($Mission['Mission_Number']). '<br />';
				echo '' .stripslashes($Mission['Mission_Name']). '<br />';
				echo '' .stripslashes(nl2br($Mission['Mission_Introduction'])). '<br />';
				$missionID = stripslashes($Mission['Mission_ID']);
				echo '<form method="POST" action="Mission.php">';
				echo "<input type=\"hidden\" name=\"missionID\" value=\"$missionID\">";
				echo "<input type=\"submit\" name=\"Accept\" value=\"$mission0\">";
				echo '</form><br /><br />';
			}

			$Mission_Query->closeCursor();

			if (empty($missionID))
			{
				echo "$mission1";
			}
		}
	}
	
	if ($Mission_Number == 0)
	{
		$Mission_Query = $bdd->prepare("SELECT * FROM Caranille_Missions
		WHERE Mission_Number= 1
		AND Mission_Town= ?");
		$Mission_Query->execute(array($townID));

		while ($Mission = $Mission_Query->fetch())
		{
			echo 'N° ' .stripslashes($Mission['Mission_Number']). '<br />';
			echo '' .stripslashes($Mission['Mission_Name']). '<br />';
			echo '' .stripslashes(nl2br($Mission['Mission_Introduction'])). '<br />';
			$missionID = stripslashes($Mission['Mission_ID']);
			echo '<form method="POST" action="Mission.php">';
			echo "<input type=\"hidden\" name=\"missionID\" value=\"$missionID\">";
			echo "<input type=\"submit\" name=\"Accept\" value=\"$mission0\">";
			echo '</form><br /><br />';
		}
		$Mission_Query->closeCursor();

		if (empty($missionID))
		{
			echo "$mission1";
		}
	}
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

function findBattle($bdd, $characterID)
{
    $battleIDQuery = $bdd->prepare('SELECT * FROM Caranille_Battles_List 
    WHERE Battle_List_Character_ID = ?');
    $battleIDQuery->execute([$characterID]);
    while ($battleID = $battleIDQuery->fetch()) 
    {
        $Battle = $battleID;
    }
    $battleIDQuery->closeCursor();
    return $Battle;
}