<?php
function addLevel($bdd, $levelExperience, $characterID)
{
	$findSkillPoint = $bdd->query("SELECT * FROM Caranille_Configuration");
	
	while ($skillPoint = $findSkillPoint->fetch())
	{
		$sp = $skillPoint['Configuration_Skill_Point'];
	}
	
    $findLevelQuery = $bdd->prepare('SELECT * FROM Caranille_Characters, Caranille_Levels
    WHERE Level_Number = Character_Level +1
    AND Character_ID = ? ');
    $findLevelQuery->execute([$characterID]);

    while ($findLevel = $findLevelQuery->fetch()) 
    {
        $hp = $findLevel['Level_HP'];
        $mp = $findLevel['Level_MP'];
        $strength = $findLevel['Level_Strength'];
        $magic = $findLevel['Level_Magic'];
        $agility = $findLevel['Level_Agility'];
        $defense = $findLevel['Level_Defense'];
    }

    $nextLevel = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Level = Character_Level +1,
    Character_Experience = Character_Experience - :levelExperience,
    Character_Skill_Point = Character_Skill_Point + :sp,
    Character_HP_Level = :hp,
    Character_MP_Level = :mp,
    Character_Strength_Level = :strength,
    Character_Magic_Level = :magic,
    Character_Agility_Level = :agility,
    Character_Defense_Level = :defense
    WHERE Character_ID= :characterID');

    $nextLevel->execute([
    'levelExperience' => $levelExperience,
    'sp' => $sp,
    'hp' => $hp,
    'mp' => $mp,
    'strength' => $strength,
    'magic' => $magic,
    'agility' => $agility,
    'defense' => $defense,
    'characterID' => $characterID]);

    $nextLevel->closeCursor();
}

function addLog($bdd, $account, $character, $pageLoadTime)
{
	$Date = date('Y-m-d H:i:s');
	$IP = $_SERVER['REMOTE_ADDR'];
    $Path = $_SERVER['PHP_SELF'];
    
    $addLog = $bdd->query("INSERT INTO Caranille_Logs VALUES(
    '',
    '$Date',
    '$IP',
    '$account',
    '$character',
    '$Path',
    '$pageLoadTime')");
    $addLog->closeCursor();
}