<?php
//TERMINAL FUNCTIONS
function terminalAddGolds($bdd, $characterID, $gold)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Gold = Character_Gold + :gold
    WHERE Character_ID = :characterId');
    
    $updateAccount->execute([
    'characterId' => $characterID,
    'gold' => $gold]);

    $updateAccount->closeCursor();
}

function terminalAddXP($bdd, $characterID, $XP){
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Experience = Character_Experience + :xp
    WHERE Character_ID = :characterId');
    
    $updateAccount->execute([
    'characterId' => $characterID,
    'xp' => $XP]);

    $updateAccount->closeCursor();
}
//GLOBALES FUNCTIONS
function updateAllStats($bdd, $characterID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_HP_Total = Character_HP_Level + Character_HP_SP + Character_HP_Equipment + Character_HP_Parchment,
    Character_MP_Total = Character_MP_Level + Character_MP_SP + Character_MP_Equipment + Character_MP_Parchment,
    Character_Strength_Total = Character_Strength_Level + Character_Strength_SP + Character_Strength_Equipment + Character_Strength_Parchment,
    Character_Magic_Total = Character_Magic_Level + Character_Magic_SP + Character_Magic_Equipment + Character_Magic_Parchment,
    Character_Agility_Total = Character_Agility_Level + Character_Agility_SP + Character_Agility_Equipment + Character_Agility_Parchment,
    Character_Defense_Total = Character_Defense_Level + Character_Defense_SP + Character_Defense_Equipment + Character_Defense_Parchment,
    Character_Wisdom_Total = Character_Wisdom_Level + Character_Wisdom_SP + Character_Wisdom_Equipment + Character_Wisdom_Parchment
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute(['Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}


function updateMessagePriveStatut($bdd, $MPID, $statut)
{
	$updateMP = $bdd->prepare('UPDATE Caranille_Private_Messages
    SET Private_Message_Lu = :statut
    WHERE Private_Message_ID = :MPID');

    $updateMP->execute([
    'MPID' => $MPID,
    'statut' => $statut]);

    $updateMP->closeCursor();
}

function updateStrengthCharacter($bdd, $character, $characterID)
{
	$characterStrength = $character->getStrength();
	//A insérer ici tout les bonus
	
	$strengthTotal = $characterStrength; //a rajouter ici tout les bonus
	
	$updateStrength = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Strength_Total = :strength
    WHERE Character_ID = :characterID');

    $updateStrength->execute([
    'strength' => $strengthTotal,
    'characterID' => $characterID]);

    $updateStrength->closeCursor();
}
function updateChapterID($bdd, $characterID)
{
	$updateChapter = $bdd->prepare('UPDATE Caranille_Characters 
	SET Character_Chapter = Character_Chapter + 1 
	WHERE Character_ID = :characterID');
	$updateChapter->execute(['characterID' => $characterID]);
	$updateChapter->closeCursor();
}