<?php
//GLOBALES FUNCTIONS
function findLevel($bdd, $characterLevel, $characterExperience, $characterId)
{
    $level = $characterLevel + 1;
    $levelFound = $bdd->prepare('SELECT * FROM Caranille_Levels 
    WHERE Level_Number = ?');

    $levelFound->execute([$level]);

    while ($levelData = $levelFound->fetch()) 
    {
        $levelExperienceRequired = $levelData['Level_Experience'];
    }
    $levelFound->closeCursor();

    return $levelExperienceRequired;
}

function newAccount($bdd, $id)
{
    $accountListQuery = $bdd->prepare('SELECT * FROM Caranille_Accounts 
    WHERE Account_ID = ?');
    $accountListQuery->execute([$id]);

    while ($accountList = $accountListQuery->fetch()) 
    {
        $account = new Account(
        $accountList['Account_ID'],
        $accountList['Account_Pseudo'],
        $accountList['Account_Email'],
        $accountList['Account_Password'],
        $accountList['Account_Access'],
        $accountList['Account_Last_Connection'],
        $accountList['Account_Last_IP'],
        $accountList['Account_Status'],
        $accountList['Account_Reason']);
    }
    $accountListQuery->closeCursor();
    return $account;
}

function newBattleMonster($bdd, $characterID)
{
    $verifyBattleList = $bdd->prepare('SELECT * FROM Caranille_Battles_List, Caranille_Battles_Monsters
    WHERE Battle_List_Character_ID = ?
    AND Battle_List_ID = Battle_Monster_Battle_ID');

    $verifyBattleList->execute([$characterID]);

    while ($verifyBattle = $verifyBattleList->fetch()) 
    {
        $monster = new Monster(
        $verifyBattle['Battle_Monster_Monster_ID'],
        $verifyBattle['Battle_Monster_Monster_Picture'],
        $verifyBattle['Battle_Monster_Monster_Name'],
        $verifyBattle['Battle_Monster_Monster_Description'],
        $verifyBattle['Battle_Monster_Monster_Level'],
        $verifyBattle['Battle_Monster_Monster_HP'],
        $verifyBattle['Battle_Monster_Monster_MP'],
        $verifyBattle['Battle_Monster_Monster_Strength'],
        $verifyBattle['Battle_Monster_Monster_Magic'],
        $verifyBattle['Battle_Monster_Monster_Agility'],
        $verifyBattle['Battle_Monster_Monster_Defense'],
        $verifyBattle['Battle_Monster_Monster_Experience'],
        $verifyBattle['Battle_Monster_Monster_Gold']);
    }
    $verifyBattleList->closeCursor();
    return $monster;
}

function newChapter($bdd, $chapterID)
{
	$chapterListQuery = $bdd->prepare('SELECT * FROM Caranille_Chapters 
	WHERE Chapter_ID = ?');
    $chapterListQuery->execute([$chapterID]);

    while ($chapterList = $chapterListQuery->fetch()) 
    {
        $chapter = new Chapter(
        $chapterList['Chapter_ID'],
        $chapterList['Chapter_Number'],
        $chapterList['Chapter_Name'],
        $chapterList['Chapter_Opening'],
        $chapterList['Chapter_Ending'],
        $chapterList['Chapter_Defeate'],
        $chapterList['Chapter_Monster']);
    }
    $chapterListQuery->closeCursor();
    return $chapter;
}

function newCharacter($bdd, $id)
{
    $characterListQuery = $bdd->prepare('SELECT * FROM Caranille_Characters, Caranille_Levels
    WHERE Character_Account_ID = ?
    AND Character_Level = Level_Number');
    
    $characterListQuery->execute([$id]);
    while ($characterList = $characterListQuery->fetch()) 
    {
        $character = new Character(
        $characterList['Character_ID'],
        $characterList['Character_Account_ID'],
        $characterList['Character_Picture'],
        $characterList['Character_Last_Name'],
        $characterList['Character_First_Name'],
        $characterList['Character_Level'],
        $characterList['Character_HP_Current'],
        $characterList['Character_HP_Total'],
        $characterList['Character_MP_Current'],
        $characterList['Character_MP_Total'],
        $characterList['Character_Strength_Total'],
        $characterList['Character_Magic_Total'],
        $characterList['Character_Agility_Total'],
        $characterList['Character_Defense_Total'],
        $characterList['Character_Wisdom_Total'],
        $characterList['Character_Experience'],
        $characterList['Character_Skill_Point'],
        $characterList['Character_Gold'],
        $characterList['Character_Town_ID'],
        $characterList['Character_Chapter']);
    }
    $characterListQuery->closeCursor();
   	return $character;
}

function newEquipment($bdd, $ID)
{
    $equipmentListEquipment = $bdd->prepare('SELECT * FROM Caranille_Equipments
    WHERE Equipment_ID = ?');
    
    $equipmentListEquipment->execute([$ID]);
    while ($equipmentList = $equipmentListEquipment->fetch()) 
    {
        $equipment = new equipment(
        $equipmentList['Equipment_ID'],
        $equipmentList['Equipment_Picture'],
        $equipmentList['Equipment_Type'],
        $equipmentList['Equipment_Level_Required'],
        $equipmentList['Equipment_Name'],
        $equipmentList['Equipment_Description'],
        $equipmentList['Equipment_HP_Effect'],
        $equipmentList['Equipment_MP_Effect'],
        $equipmentList['Equipment_Strength_Effect'],
        $equipmentList['Equipment_Magic_Effect'],
        $equipmentList['Equipment_Agility_Effect'],
        $equipmentList['Equipment_Defense_Effect'],
        $equipmentList['Equipment_Sagesse_Effect'],
        $equipmentList['Equipment_Purchase_Price'],
        $equipmentList['Equipment_Sale_Price']);
    }
    $equipmentListEquipment->closeCursor();
   	return $equipment;
}

function newItem($bdd, $ID)
{
    $itemListItem = $bdd->prepare('SELECT * FROM Caranille_Items
    WHERE Item_ID = ?');
    
    $itemListItem->execute([$ID]);
    while ($itemList = $itemListItem->fetch()) 
    {
        $item = new Item(
        $itemList['Item_ID'],
        $itemList['Item_Picture'],
        $itemList['Item_Type'],
        $itemList['Item_Level_Required'],
        $itemList['Item_Name'],
        $itemList['Item_Description'],
        $itemList['Item_HP_Effect'],
        $itemList['Item_MP_Effect'],
        $itemList['Item_Strength_Effect'],
        $itemList['Item_Magic_Effect'],
        $itemList['Item_Agility_Effect'],
        $itemList['Item_Defense_Effect'],
        $itemList['Item_Sagesse_Effect'],
        $itemList['Item_Purchase_Price'],
        $itemList['Item_Sale_Price']);
    }
    $itemListItem->closeCursor();
   	return $item;
}

function newInvocation($bdd, $id)
{
    $newInvocationQuery = $bdd->prepare('SELECT * FROM Caranille_Invocations
    WHERE Invocation_ID = ?');
    $newInvocationQuery->execute([$id]);

    while ($newInvocation = $newInvocationQuery->fetch()) 
    {   
        $invocation = new Invocation(
        $newInvocation['Invocation_ID'],
        $newInvocation['Invocation_Image'],
        $newInvocation['Invocation_Name'],
        $newInvocation['Invocation_Description'],
        $newInvocation['Invocation_Damage'],
        $newInvocation['Invocation_Price']);
    }
    $newInvocationQuery->closeCursor();
    return $invocation;
}

function newMagic($bdd, $magicID)
{
    $MagicListQuery = $bdd->prepare('SELECT * FROM Caranille_Magics 
    WHERE Magic_ID = ?');
    $MagicListQuery->execute([$magicID]);

    while ($MagicList = $MagicListQuery->fetch()) 
    {
        $magic = new Magic(
        $MagicList['Magic_ID'],
        $MagicList['Magic_Picture'],
        $MagicList['Magic_Name'],
        $MagicList['Magic_Description'],
        $MagicList['Magic_Type'],
        $MagicList['Magic_Effect'],
        $MagicList['Magic_MP_Cost'],
        $MagicList['Magic_Price']);
    }
    $MagicListQuery->closeCursor();
    return $magic;
}

function newMission($bdd, $ID)
{
	$missionList = $bdd->prepare('SELECT * FROM Caranille_Missions 
	WHERE Mission_ID = ?');
    $missionList->execute([$ID]);

    while ($missionFetch = $missionList->fetch()) 
    {
        $mission = new Mission(
        $missionFetch['Mission_ID'],
        $missionFetch['Mission_Town'],
        $missionFetch['Mission_Number'],
        $missionFetch['Mission_Name'],
        $missionFetch['Mission_Introduction'],
        $missionFetch['Mission_Victory'],
        $missionFetch['Mission_Defeate'],
        $missionFetch['Mission_Monster']);
    }
    $missionList->closeCursor();
    return $mission;
}

function newMonster($bdd, $monsterID)
{
    $verifyMonster = $bdd->prepare('SELECT * FROM Caranille_Monsters
	WHERE Monster_ID = ?');

    $verifyMonster->execute([$monsterID]);

    while ($monsterCara = $verifyMonster->fetch()) 
    {
        $monster = new Monster(
        $monsterCara['Monster_ID'],
        $monsterCara['Monster_Picture'],
        $monsterCara['Monster_Name'],
        $monsterCara['Monster_Description'],
        $monsterCara['Monster_Level'],
        $monsterCara['Monster_HP'],
        $monsterCara['Monster_MP'],
        $monsterCara['Monster_Strength'],
        $monsterCara['Monster_Magic'],
        $monsterCara['Monster_Agility'],
        $monsterCara['Monster_Defense'],
        $monsterCara['Monster_Experience'],
        $monsterCara['Monster_Gold']);
    }
    $verifyMonster->closeCursor();
    return $monster;
}

function newNews($bdd, $id)
{
    $newListQuery = $bdd->prepare('SELECT * FROM Caranille_News 
    WHERE News_ID = ?');
    $newListQuery->execute([$id]);

    while ($newList = $newListQuery->fetch()) 
    {
        $new = new News(
        $newList['News_ID'],
        $newList['News_Title'],
        $newList['News_Message'],
        $newList['News_Account_Pseudo'],
        $newList['News_Date']);
    }
    $newListQuery->closeCursor();
    return $new;
}

function newTown($bdd, $town)
{
    if ($town == 0) 
    {
        $town = new Town(
        0,
        'http://localhost',
        'None',
        'None',
        0,
        1);
    } 
    else 
    {
        $townsListQuery = $bdd->prepare('SELECT * FROM Caranille_Towns 
        WHERE Town_ID = ?');

        $townsListQuery->execute([$town]);

        while ($townsList = $townsListQuery->fetch())
        {
            $town = new Town(
            $townsList['Town_ID'],
            $townsList['Town_Picture'],
            $townsList['Town_Name'],
            $townsList['Town_Description'],
            $townsList['Town_Price_INN'],
            $townsList['Town_Chapter']);
        }
        $townsListQuery->closeCursor();
    }
    return $town;
}

function verifyBattle($bdd, $characterID)
{
    $verifyBattleList = $bdd->prepare('SELECT * FROM Caranille_Battles_List, Caranille_Battles_Monsters
    WHERE Battle_List_Character_ID = ?
    AND Battle_List_ID = Battle_Monster_Battle_ID');
    $verifyBattleList->execute([$characterID]);
    $verifyBattle = $verifyBattleList->rowCount();
    $verifyBattleList->closeCursor();
    return $verifyBattle;
}

function verifyConnection($bdd, $accountPseudo, $accountPassword)
{
    $accountListQuery = $bdd->prepare('SELECT * FROM Caranille_Accounts 
    WHERE Account_Pseudo = ? 
    AND Account_Password = ?');

    $accountListQuery->execute([$accountPseudo, $accountPassword]);

    $accountList = $accountListQuery->rowCount();
    $accountListQuery->closeCursor();

    return $accountList;
}

function verifyMessagePrivate($bdd, $id)
{
    $MPList = $bdd->prepare("SELECT * FROM Caranille_Private_Messages 
    WHERE Private_Message_Receiver = ? AND Private_Message_Lu = '0' AND Private_Message_Parent_ID = '0'");
    $MPList->execute([$id]);
	$MP = $MPList->rowCount();
    $MPList->closeCursor();
    return $MP;
}

function verifyTown($bdd, $characterTown)
{
    $verifyTownAccess = $bdd->prepare('SELECT * FROM Caranille_Towns 
    WHERE Town_Chapter <= ?');
    $verifyTownAccess->execute([$characterTown]);

    $verifyTown = $verifyTownAccess->rowCount();
    $verifyTownAccess->closeCursor();

    return $verifyTown;
}

function verifyWarning($bdd, $accountID)
{
	$verifyWarning = $bdd->prepare('SELECT * FROM Caranille_Warnings 
    WHERE Warning_Receiver = ?');
    $verifyWarning->execute([$accountID]);

    $verifyWarningNb = $verifyWarning->rowCount();
    $verifyWarning->closeCursor();

    return $verifyWarningNb;	
}