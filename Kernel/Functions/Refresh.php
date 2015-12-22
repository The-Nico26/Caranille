<?php

if (isset($_SESSION['Account_ID'])) 
{
    $account = newAccount($bdd, $_SESSION['Account_ID']);
    $character = newCharacter($bdd, $_SESSION['Account_ID']);
    $town = newTown($bdd, $character->getTownID());
    $verifyBattle = verifyBattle($bdd, $character->getID());
    if ($verifyBattle >= 1) 
    {
        $monster = newBattleMonster($bdd, $character->getID());

        $monsterID = $monster->getID();
        $monsterPicture = $monster->getPicture();
        $monsterName = $monster->getName();
        $monsterDescription = $monster->getDescription();
        $monsterLevel = $monster->getLevel();
        $monsterHP = $monster->getHp();
        $monsterMP = $monster->getMp();
        $monsterStrength = $monster->getStrength();
        $monsterMagic = $monster->getMagic();
        $monsterAgility = $monster->getAgility();
        $monsterDefense = $monster->getDefense();
        $monsterExperience = $monster->getExperience();
        $monsterGold = $monster->getGold();

        $minStrength = $character->getStrength() / 1.1;
        $maxStrength = $character->getStrength() * 1.1;

        $minMagic = $character->getMagic() / 1.1;
        $maxMagic = $character->getMagic() * 1.1;

        $minDefense = $character->getDefense() / 1.1;
        $maxDefense = $character->getDefense() * 1.1;

        $monsterMinStrength = $monster->getStrength() / 1.1;
        $monsterMaxStrength = $monster->getStrength() * 1.1;

        $monsterMinDefense = $monster->getDefense() / 1.1;
        $monsterMaxDefense = $monster->getDefense() * 1.1;

        $positiveDamagePlayer = mt_rand($minStrength, $maxStrength);
        $negativeDamagePlayer = mt_rand($monsterMinDefense, $monsterMaxDefense);

        $totalDamagePlayer = $positiveDamagePlayer - $negativeDamagePlayer;

        $monsterPositiveDamage = mt_rand($monsterMinStrength, $monsterMaxStrength);
        $monsterNegativeDamage = mt_rand($minDefense, $maxDefense);

        $totalDamageMonster = $monsterPositiveDamage - $monsterNegativeDamage;
    }

    //GLOBALES VARIABLE OF ACCOUNT
    $accountID = $account->getID();
    $accountPseudo = $account->getPseudo();
    $accountEmail = $account->getEmail();
    $accountAccess = $account->getAccess();

    //GLOBALES VARIABLES OF CHARACTER
    $characterID = $character->getID();
    $characterLastName = $character->getLastName();
    $characterFirstName = $character->getFirstName();
    $characterLevel = $character->getLevel();
    $characterPicture = $character->getPicture();
    $characterHP = $character->getHP();
    $characterHPMax = $character->getHPMax();
    $characterMP = $character->getMP();
    $characterMPMax = $character->getMPMax();
    $characterStrength = $character->getStrength();
    $characterMagic = $character->getMagic();
    $characterAgility = $character->getAgility();
    $characterDefense = $character->getDefense();
    $characterWisdom = $character->getWisdom();
    $characterExperience = $character->getExperience();
    $characterSkillPoint = $character->getSkillPoint();
    $characterGold = $character->getGold();
    $characterTownID = $character->getTownID();
    $characterChapter = $character->getChapter();
    
	//MIS A JOUR STRENGTH PLAYER
	updateStrengthCharacter($bdd, $character, $characterID);
	
    //GLOBALES VARIABLES OF TOWN
    $townID = $town->getID();
    $townPicture = $town->getPicture();
    $townName = $town->getName();
    $townDescription = $town->getDescription();
    $townPriceInn = $town->getPriceInn();
    $townChapter = $town->getChapter();

    //VERIFICATION OF THE NEXT LEVEL
    $levelExperience = findLevel($bdd, $characterLevel, $characterExperience, $characterID);
    $nextLevel = $levelExperience - $characterExperience;

    if ($nextLevel <= 0) 
    {
        addLevel($bdd, $levelExperience, $characterID);
        updateAllStats($bdd, $characterID);
        header("Location: {$linkRoot}/Modules/Main/index.php");
    }
    
    //VERIFICATION OF MESSAGE PRIVATE
    $totalMessagePrive = verifyMessagePrivate($bdd, $accountID);
    
    //VERIFICATION OF WARNING
    $totalWarning = verifyWarning($bdd, $accountID);
}
