<?php
function addHP($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_HP_SP = Character_HP_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function adddMP($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_MP_SP = Character_MP_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function addStrength($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Strength_SP = Character_Strength_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function addMagic($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Magic_SP = Character_Magic_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function addgility($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Agility_SP = Character_Agility_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function addDefense($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Defense_SP = Character_Defense_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function addWisdom($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Wisdom_SP = Character_Wisdom_SP + 1,
    Character_Skill_Point = Character_Skill_Point -1
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}