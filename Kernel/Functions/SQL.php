<?php
//LAUNCH THE CONNECTION
try 
{
    $bdd = new PDO($Dsn, $User, $Password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    echo 'An error as occurred, Cannot connect to the database. Error: '.$e->getMessage();
}

//ADMIN FUNCTIONS
function adminAddChapter($bdd, $chapterNumber, $chapterName, $chapterOpening, $chapterEnding, $chapterDefeate, $chapterMonster)
{
	$addChapter = $bdd->prepare("
    INSERT INTO Caranille_Chapters VALUES(
    '',
    :chapterNumber,
    :chapterName,
    :chapterOpening,
    :chapterEnding,
    :chapterDefeate,
    :chapterMonster)");

    $addChapter->execute([
    'chapterNumber' => $chapterNumber,
    'chapterName' => $chapterName,
    'chapterOpening' => $chapterOpening,
    'chapterEnding' => $chapterEnding,
    'chapterDefeate' => $chapterDefeate,
    'chapterMonster' => $chapterMonster]);

    $addChapter->closeCursor();
}

function adminAddMonsterTown($bdd, $townID, $monsterID)
{
	$addMonsterTown = $bdd->prepare("
    INSERT INTO Caranille_Towns_Monsters VALUES(
    '',
    :monsterID,
    :townID
    )");

    $addMonsterTown->execute([
    'monsterID' => $monsterID,
    'townID' => $townID,]);

    $addMonsterTown->closeCursor();
}

function adminAddNews($bdd, $newTitle, $newMessage, $newAccountPseudo)
{
	$date = date('Y-m-d H:i:s');
    $addNew = $bdd->prepare("
	INSERT INTO Caranille_News VALUES(
    '',
    :newTitle,
    :newMessage,
    :newAccountPseudo,
    :newDate)");

    $addNew->execute([
    'newTitle' => $newTitle,
    'newMessage' => $newMessage,
    'newAccountPseudo' => $newAccountPseudo,
    'newDate' => $date]);

    $addNew->closeCursor();
}

function adminAddTown($bdd, $townPicture, $townName, $townDescription, $townPriceInn, $townChapter)
{
	$addTown = $bdd->prepare("
    INSERT INTO Caranille_Towns VALUES(
    '',
    :townPicture,
    :townName,
    :townDescription,
    :townPriceInn,
    :townChapter)");

    $addTown->execute([
    'townPicture' => $townPicture,
    'townName' => $townName,
    'townDescription' => $townDescription,
    'townPriceInn' => $townPriceInn,
    'townChapter' => $townChapter,]);

    $addTown->closeCursor();
}

function adminDeleteMonster($bdd, $monsterId)
{
	$deleteMonster = $bdd->prepare('DELETE FROM Caranille_Monsters WHERE Monster_ID = ?');
    $deleteMonster->execute([$monsterId]);
    $deleteMonster->closeCursor();
}

function adminDeleteNew($bdd, $newID)
{
	$deleteNew = $bdd->prepare('DELETE FROM Caranille_News WHERE News_ID = ?');
    $deleteNew->execute([$newID]);
    $deleteNew->closeCursor();
}

function adminDeleteTown($bdd, $townID)
{
	$deleteTown = $bdd->prepare('DELETE FROM Caranille_Towns WHERE Town_ID = ?');
    $deleteTown->execute([$townID]);
    $deleteTown->closeCursor();
}

function adminUpdateAccount($bdd, $accountPseudo, $accountEmail, $accountAccess, $accountID)
{
	$updateAccount = $bdd->prepare("
	UPDATE Caranille_Accounts 
	SET Account_Pseudo = :accountPseudo, 
	Account_Email = :accountEmail, 
	Account_Access = :accountAccess
	WHERE Account_ID = :accountID");
	
	$updateAccount->execute([
    'accountPseudo' => $accountPseudo,
    'accountEmail' => $accountEmail,
    'accountAccess' => $accountAccess,
    'accountID' => $accountID,]);
}

function adminShowConfiguration($bdd, $aconfig0, $aconfig1, $aconfig2, $aconfig3, $aconfig4, $aconfig5)
{
	foreach($bdd->query("SELECT * FROM Caranille_Configuration") as $configuration) 
	{
		$confName = $configuration['Configuration_RPG_Name'];
		$confPresentation = $configuration['Configuration_Presentation'];
		$confAccess = $configuration['Configuration_Access'];
		
        echo '<form method="POST" action="Edit.php">';
        echo $aconfig0."<br/><input type=\"text\" name=\"confName\" placeholder=\"$aconfig0\" value=\"$confName\" required><br/><br/>";
        echo $aconfig1."<br/><textarea name=\"confPresentation\" rows=\"10\" cols=\"50\"  placeholder=\"$aconfig1\" required>$confPresentation</textarea><br/><br/>";
        echo $aconfig2."<br/><select name=\"confAccess\">";
        if ($confAccess == 0)
		{
			echo "<option selected=\"selected\" value=\"0\">$aconfig3</option>";
			echo "<option value=\"1\"> $aconfig4</option>";
		}
		else if ($confAccess == 1)
		{
			echo "<option selected=\"selected\" value=\"1\"> $aconfig4</option>";
			echo "<option value=\"0\">$aconfig3</option>";
		}
		echo "</select><br/><br/>";
        echo "<br/><input type=\"submit\" name=\"Edit\" value=\"$aconfig5\">";
        echo '</form>';
        
        return;
    }
}

function adminShowAllAccounts($bdd, $aaccounts2, $aaccounts3, $aaccounts4)
{
	$Account_List_Query = $bdd->query("SELECT * FROM Caranille_Accounts");
	while ($Account_List = $Account_List_Query->fetch())
	{
		echo "$aaccounts2 : " .htmlspecialchars(addslashes($Account_List['Account_Pseudo'])). '<br />';
		$accountID = htmlspecialchars(addslashes($Account_List['Account_ID']));
		echo '<form method="POST" action="Edit.php">';
		echo "<input type=\"hidden\" name=\"accountID\" value=\"$accountID\">";
		echo "<input type=\"submit\" name=\"Second_Edit\" value=\"$aaccounts3\">";
		echo "<input type=\"submit\" name=\"Delete\" value=\"$aaccounts4\">";
		echo '</form>';
	}
	$Account_List_Query->closeCursor();
}


function adminShowAllMonsters($bdd, $amonster2, $amonster3, $amonster4)
{
    foreach($bdd->query("SELECT * FROM Caranille_Monsters") as $monsterList) {
        echo "$amonster2 : " .htmlspecialchars(addslashes($monsterList['Monster_Name'])). '<br />';
        $monsterID = htmlspecialchars(addslashes($monsterList['Monster_ID']));
        echo '<form method="POST" action="Edit.php">';
        echo "<input type=\"hidden\" name=\"monsterID\" value=\"$monsterID\">";
        echo "<input type=\"submit\" name=\"Second_Edit\" value=\"$amonster3\">";
        echo '</form>';
         
        echo '<form method="POST" action="Delete.php">';
        echo "<input type=\"hidden\" name=\"monsterID\" value=\"$monsterID\">";
        echo "<input type=\"submit\" name=\"Delete\" value=\"$amonster4\">";
        echo '</form>';
    }
}

function adminShowAllMonstersList($bdd){
	echo "<select name=\"monsterID\">";
	foreach($bdd->query("SELECT * FROM Caranille_Monsters") as $monsterList) 
	{
        $monsterName = htmlspecialchars(addslashes($monsterList['Monster_Name']));
        $monsterID = htmlspecialchars(addslashes($monsterList['Monster_ID']));
        echo "<option value=\"$monsterID\">$monsterName</option>";
    }
    echo '</select>';
}

function adminShowAllNews($bdd, $anew3, $anew4, $anew5)
{
	foreach($bdd->query("SELECT * FROM Caranille_News") as $newList) 
	{
        echo "$anew3 : " .htmlspecialchars(addslashes($newList['News_Title'])). '<br />';
        $newID = htmlspecialchars(addslashes($newList['News_ID']));
        echo '<form method="POST" action="Edit.php">';
        echo "<input type=\"hidden\" name=\"newID\" value=\"$newID\">";
        echo "<input type=\"submit\" name=\"Second_Edit\" value=\"$anew4\">";
        echo '</form>';
         
        echo '<form method="POST" action="Delete.php">';
        echo "<input type=\"hidden\" name=\"newID\" value=\"$newID\">";
        echo "<input type=\"submit\" name=\"Delete\" value=\"$anew5\">";
        echo '</form><br />';
    }
}

function adminShowAllTowns($bdd, $atown3, $atown4, $atown5, $atown6)
{
	foreach($bdd->query("SELECT * FROM Caranille_Towns") as $townList)
	{
		echo "$atown3 : " .htmlspecialchars(addslashes($townList['Town_Name'])). '<br />';
        $townID = htmlspecialchars(addslashes($townList['Town_ID']));
        echo '<form method="POST" action="Edit.php">';
        echo "<input type=\"hidden\" name=\"townID\" value=\"$townID\">";
        echo "<input type=\"submit\" name=\"Second_Edit\" value=\"$atown4\">";
        echo '</form><br/>';
        
        echo '<form method="POST" action="Delete.php">';
        echo "<input type=\"hidden\" name=\"townID\" value=\"$townID\">";
		echo "<input type=\"submit\" name=\"Delete\" value=\"$atown5\">";
		echo '</form><br/>';
		
		echo '<form method="POST" action="Monster.php">';
        echo "<input type=\"hidden\" name=\"townID\" value=\"$townID\">";
		echo "<input type=\"submit\" name=\"MonsterList\" value=\"$atown6\">";
		echo '</form><br/>';
	}
}

function adminUpdateConfiguration($bdd, $confName, $confPresentation, $confAccess)
{
	$updateConfiguration = $bdd->prepare('
	UPDATE Caranille_Configuration 
	SET Configuration_MMORPG_Name = :confName,
	Configuration_Presentation = :confPresentation,
	Configuration_Access = :confAccess
	WHERE Configuration_ID = 1');
		
	$updateConfiguration->execute([
	'confName' => $confName,
	'confPresentation' => $confPresentation,
	'confAccess' => $confAccess,]);
	
	$updateConfiguration->closeCursor();
}

function adminUpdateNew($bdd, $newID, $newTitle, $newMessage, $newAccountPseudo, $newDate) 
{
    $updateNew = $bdd->prepare('
    UPDATE Caranille_News
    SET News_Title = :newTitle,
    News_Message = :newMessage,
    News_Account_Pseudo = :newAccountPseudo,
    News_Date = :newDate
    WHERE News_ID = :newID');

    $updateNew->execute([
    'newID' => $newID,
    'newTitle' => $newTitle,
    'newMessage' => $newMessage,
    'newAccountPseudo' => $newAccountPseudo,
    'newDate' => $newDate]);

    $updateNew->closeCursor();
}

function adminUpdateTown($bdd, $townID, $townPicture, $townName, $townDescription, $townPriceInn, $townChapter)
{
	$updateTown = $bdd->prepare('
	UPDATE Caranille_Towns
	SET Town_Picture = :townPicture,
	Town_Name = :townName,
	Town_Description = :townDescription,
	Town_Price_INN = :townPriceInn,
	Town_Chapter = :townChapter
	WHERE Town_ID = :townID');
	
	$updateTown->execute([
	'townPicture' => $townPicture,
	'townName' => $townName,
	'townDescription' => $townDescription,
	'townPriceInn' => $townPriceInn,
	'townChapter' => $townChapter,
	'townID' => $townID]);
	
	$updateTown->closeCursor();
}

function adminRemoveMonsterTown($bdd, $townMonsterID)
{
	$deleteTownMonster = $bdd->prepare('DELETE FROM Caranille_Towns_Monsters WHERE Towns_Monsters_ID = ?');
    $deleteTownMonster->execute([$townMonsterID]);
    $deleteTownMonster->closeCursor();
}

function adminShowMonsterTown($bdd, $townID, $atown19, $atown20)
{
	$showMonsterTown = $bdd->prepare('
    SELECT * FROM Caranille_Towns_Monsters WHERE Towns_ID = :townID ORDER BY Towns_Monsters_ID desc');
    $showMonsterTown->execute([
    'townID' => $townID]);
	echo '<br /><table>';
		echo '<tr>';
            echo '<th>';
                echo $atown20;
            echo '</th>';
            echo '<th>';
                echo "";
            echo '</th>';
        echo '</tr>';
    while ($monster = $showMonsterTown->fetch()) 
    {
			$monsterID = $monster['Monsters_ID'];
			$townMonsterID = $monster['Towns_Monsters_ID'];
            echo '<tr>';
                echo '<th>';
                	echo connexionMonster($bdd, $monsterID)->getName();
                echo '</th>';
                echo '<th>';
	                echo '<form method="POST" action="End_Edit.php">';
				    echo "<input type=\"hidden\" name=\"townID\" value=\"$townID\">";
				    echo "<input type=\"hidden\" name=\"townMonsterID\" value=\"$townMonsterID\">";
					echo "<input type=\"submit\" name=\"removeMonster\" value=\"$atown19\">";
					echo '</form>';
                echo '</th>';
            echo '</tr>';
        
    }
    echo '</table>';
    $showMonsterTown->closeCursor();
}

function adminUpdateMonster($bdd, $monsterId,  $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHp, $monsterMp, $monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold)
{
    $updateMonster = $bdd->prepare('
    UPDATE Caranille_Monsters
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
    'Monster_ID' => $monsterId,
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
    'Monster_Gold' => $monsterGold,]);

    $updateMonster->closeCursor();
}

//END OF ADMIN FUNCTIONS
//MODERATOR FUNCTIONS

function moderatorAddReason($bdd, $playerID, $reason)
{
	$addReason = $bdd->prepare('
    UPDATE Caranille_Accounts
    SET Account_Reason = :reason,
    Account_Status = :status
    WHERE Account_ID = :playerID');

    $addReason->execute([
    'reason' => $reason,
    'status' => "1",
    'playerID' => $playerID]);

    $addReason->closeCursor();
}

function moderatorDeleteReason($bdd, $playerID)
{
	$deleteReason = $bdd->prepare('
    UPDATE Caranille_Accounts
    SET Account_Reason = \'\',
	Account_Status = \'0\'
    WHERE Account_ID = ?');
    $deleteReason->execute([$playerID]);
    $deleteReason->closeCursor();
}

function moderatorShowPlayerSanction($bdd)
{
	echo '<select name="playerID">';
	foreach($bdd->query("SELECT * FROM Caranille_Accounts WHERE Account_Status = '0' ORDER BY Account_Pseudo ASC") as $player)
	{
		$playerPseudo = $player['Account_Pseudo'];
		$playerID = $player['Account_ID'];
		echo "<option value=\"$playerID\">$playerPseudo</option>";
	}
	echo '</select><br/><br/>';
}

function moderatorShowPlayerSanctionList($bdd, $msanction3, $msanction4, $msanction5)
{
	echo '<br /><table>';
		echo '<tr>';
            echo '<th>';
                echo $msanction3;
            echo '</th>';
            echo '<th>';
                echo $msanction4;
            echo '</th>';
        echo '</tr>';
    foreach($bdd->query("SELECT * FROM Caranille_Accounts WHERE Account_Status = '1' ORDER BY Account_Pseudo ASC") as $player)
    {
			$accountID = $player['Account_ID'];
            echo '<tr>';
                echo '<th>';
                	echo connexionAccount($bdd, $accountID)->getPseudo();
                echo '</th>';
                echo '<th>';
	                echo '<form method="POST" action="Sanctions.php">';
				    echo "<input type=\"hidden\" name=\"accountID\" value=\"$accountID\">";
					echo "<input type=\"submit\" name=\"removeSanction\" value=\"$msanction5\">";
					echo '</form>';
                echo '</th>';
            echo '</tr>';
    }
    echo '</table>';
}

//END OF MODERATOR FUNCTIONS
//PLAYERS FUNCTION

function addAccount($bdd, $accountPseudo, $accountPassword, $accountEmail)
{
    $date = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];

    $addAccount = $bdd->prepare("
        INSERT INTO Caranille_Accounts VALUES(
            '',
            :Pseudo,
            :Email,
            :Password,
            '0',
            :Date,
            :IP,
            'Authorized',
            'None'
        )
    ");

    $addAccount->execute([
        'Pseudo' => $accountPseudo,
        'Password' => $accountPassword,
        'Email' => $accountEmail,
        'Date' => $date,
        'IP' => $ip,
    ]);

    $addAccount->closeCursor();
}
function addMonster($bdd, $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHP, $monsterMP,
					$monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold){
	$addMonster = $bdd->prepare("
		INSERT INTO Caranille_Monsters VALUES(
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
			:MonsterGold
			)");
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
		'MonsterGold' => $monsterGold,
		]);
	$addMonster->closeCursor();
}
function addBattle($bdd, $characterId, $chapterId, $missionId, $battleType)
{
    $addBattle = $bdd->prepare("
        INSERT INTO Caranille_Battles_List VALUES(
            '',
            :Character_ID,
            :Chapter_ID,
            :Mission_ID,
            :Battle_Type
        )
    ");

    $addBattle->execute([
        'Character_ID' => $characterId,
        'Chapter_ID' => $chapterId,
        'Mission_ID' => $missionId,
        'Battle_Type' => $battleType,
    ]);

    $addBattle->closeCursor();
}

function addCharacter($bdd, $characterId, $characterLastName, $characterFirstName)
{
    $addCharacter = $bdd->prepare("
        INSERT INTO Caranille_Characters VALUES(
            '',
            :Character_ID,
            'http://localhost',
            :Last_Name,
            :First_Name,
            '1',
            '120',
            '120',
            '20',
            '20',
            '10',
            '10',
            '10',
            '10',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '1'
        )
    ");

    $addCharacter->execute([
        'Character_ID' => $characterId,
        'Last_Name' => $characterLastName,
        'First_Name' => $characterFirstName,
    ]);

    $addCharacter->closeCursor();
}

function addChatMessage($bdd, $characterId, $Message)
{
	$addMessage = $bdd->prepare("INSERT INTO Caranille_Chat VALUES('', :characterId, :Message)");
	$addMessage->execute(array('characterId' => $characterId, 'Message' => $Message));
	
	$addMessage->closeCursor();
}

function addExperience($bdd, $monsterExperience, $characterId)
{
    $updateAccount = $bdd->prepare('
        UPDATE Caranille_Characters
        SET Character_Experience = Character_Experience + :Monster_Experience
        WHERE Character_ID = :Character_ID
    ');

    $updateAccount->execute([
        'Monster_Experience' => $monsterExperience,
        'Character_ID' => $characterId,
    ]);

    $updateAccount->closeCursor();
}

function addLevel($bdd, $levelExperience, $characterId)
{
	$findSkillPoint = $bdd->query("
	SELECT * FROM Caranille_Configuration
	");
	
	while ($skillPoint = $findSkillPoint->fetch())
	{
		$sp = $skillPoint['Configuration_Skill_Point'];
	}
	
    $findLevelQuery = $bdd->prepare('
        SELECT * FROM Caranille_Characters, Caranille_Levels
        WHERE Level_Number = Character_Level +1
        AND Character_ID = ?
    ');
    $findLevelQuery->execute([$characterId]);

    while ($findLevel = $findLevelQuery->fetch()) {
        $hp = $findLevel['Level_HP'];
        $mp = $findLevel['Level_MP'];
        $strength = $findLevel['Level_Strength'];
        $magic = $findLevel['Level_Magic'];
        $agility = $findLevel['Level_Agility'];
        $defense = $findLevel['Level_Defense'];
    }

    $nextLevel = $bdd->prepare('
        UPDATE Caranille_Characters
        SET Character_Level = Character_Level +1,
            Character_Experience = Character_Experience - :levelExperience,
            Character_Skill_Point = Character_Skill_Point + :sp,
            Character_HP_MAX = :hp,
            Character_MP_MAX = :mp,
            Character_Strength = :strength,
            Character_Magic = :magic,
            Character_Agility = :agility,
            Character_Defense = :defense
	    WHERE Character_ID= :characterId
    ');

    $nextLevel->execute([
        'levelExperience' => $levelExperience,
        'sp' => $sp,
        'hp' => $hp,
        'mp' => $mp,
        'strength' => $strength,
        'magic' => $magic,
        'agility' => $agility,
        'defense' => $defense,
        'characterId' => $characterId,
    ]);

    $nextLevel->closeCursor();
}

function addMonsterBattle(
    $bdd,
    $battleId,
    $monsterId,
    $monsterPicture,
    $monsterName,
    $monsterDescription,
    $monsterLevel,
    $monsterHp,
    $monsterMp,
    $monsterStrength,
    $monsterMagic,
    $monsterAgility,
    $monsterDefense,
    $monsterExperience,
    $monsterGold
) {
    $addBattle = $bdd->prepare('
        INSERT INTO Caranille_Battles_Monsters VALUES(
            :Battle_ID,
            :Monster_ID,
            :Monster_Picture,
            :Monster_Name,
            :Monster_Description,
            :Monster_Level,
            :Monster_HP,
            :Monster_MP,
            :Monster_Strength,
            :Monster_Magic,
            :Monster_Agility,
            :Monster_Defense,
            :Monster_Experience,
            :Monster_Gold
        )
    ');

    $addBattle->execute([
        'Battle_ID' => $battleId,
        'Monster_ID' => $monsterId,
        'Monster_Picture' => $monsterPicture,
        'Monster_Name' => $monsterName,
        'Monster_Description' => $monsterDescription,
        'Monster_Level' => $monsterLevel,
        'Monster_ID' => $monsterId,
        'Monster_HP' => $monsterHp,
        'Monster_MP' => $monsterMp,
        'Monster_Strength' => $monsterStrength,
        'Monster_Magic' => $monsterMagic,
        'Monster_Agility' => $monsterAgility,
        'Monster_Defense' => $monsterDefense,
        'Monster_Experience' => $monsterExperience,
        'Monster_Gold' => $monsterGold,
    ]);

    $addBattle->closeCursor();
}

function accountExist($bdd, $accountPseudo)
{
    $pseudoListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Accounts WHERE Account_Pseudo= ?
    ');
    $pseudoListQuery->execute([$accountPseudo]);

    $pseudoList = $pseudoListQuery->rowCount();

    $pseudoListQuery->closeCursor();

    return $pseudoList;
}

function characterExist($bdd, $characterLastName)
{
    $characterListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Characters WHERE Character_Last_Name= ?
    ');
    $characterListQuery->execute([$characterLastName]);

    $characterList = $characterListQuery->rowCount();

    $characterListQuery->closeCursor();

    return $characterList;
}

function clearAllChatMessages($bdd, $accountAccess, $chat7)
{
	if ($accountAccess == 2)
	{
		$bdd->exec("DELETE FROM Caranille_Chat");
		echo "$Chat_7";
	}
}

function connexionNew($bdd, $id)
{
    $newListQuery = $bdd->prepare('
        SELECT * FROM Caranille_News WHERE News_ID = ?
    ');
    $newListQuery->execute([$id]);

    while ($newList = $newListQuery->fetch()) {
        $new = new News(
            $newList['News_ID'],
            $newList['News_Title'],
            $newList['News_Message'],
            $newList['News_Account_Pseudo'],
            $newList['News_Date']
        );
    }
    $newListQuery->closeCursor();
    
    return $new;
}

function connexionAccount($bdd, $id)
{
    $accountListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Accounts WHERE Account_ID = ?
    ');
    $accountListQuery->execute([$id]);

    while ($accountList = $accountListQuery->fetch()) {
        $account = new Account(
            $accountList['Account_ID'],
            $accountList['Account_Pseudo'],
            $accountList['Account_Email'],
            $accountList['Account_Password'],
            $accountList['Account_Access'],
            $accountList['Account_Last_Connection'],
            $accountList['Account_Last_IP'],
            $accountList['Account_Status'],
            $accountList['Account_Reason']
        );
    }
    $accountListQuery->closeCursor();
    
    return $account;
}

function connexionCharacter($bdd, $id)
{
    $characterListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Characters, Caranille_Levels
        WHERE Character_Account_ID = ?
        AND Character_Level = Level_Number
    ');
    $characterListQuery->execute([$id]);
    while ($characterList = $characterListQuery->fetch()) {
        $character = new Character(
            $characterList['Character_ID'],
            $characterList['Character_Account_ID'],
            $characterList['Character_Picture'],
            $characterList['Character_Last_Name'],
            $characterList['Character_First_Name'],
            $characterList['Character_Level'],
            $characterList['Character_HP'],
            $characterList['Character_HP_MAX'],
            $characterList['Character_MP'],
            $characterList['Character_MP_MAX'],
            $characterList['Character_Strength'],
            $characterList['Character_Magic'],
            $characterList['Character_Agility'],
            $characterList['Character_Defense'],
            $characterList['Character_Armor_ID'],
            $characterList['Character_Boots_ID'],
            $characterList['Character_Gloves_ID'],
            $characterList['Character_Helmet_ID'],
            $characterList['Character_Weapon_ID'],
            $characterList['Character_Experience'],
            $characterList['Character_Skill_Point'],
            $characterList['Character_Gold'],
            $characterList['Character_Town_ID'],
            $characterList['Character_Chapter']
        );
    }
    $characterListQuery->closeCursor();
   return $character;
}
function connexionMonster($bdd, $monsterID)
{
    $verifyMonster = $bdd->prepare('
        SELECT * FROM Caranille_Monsters
	    WHERE Monster_ID = ?
    ');

    $verifyMonster->execute([$monsterID]);

    while ($monsterCara = $verifyMonster->fetch()) {
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
            $monsterCara['Monster_Gold']
        );
    }
    $verifyMonster->closeCursor();

    return $monster;
}

function connexionBattleMonster($bdd, $characterId)
{
    $verifyBattleList = $bdd->prepare('
        SELECT * FROM Caranille_Battles_List, Caranille_Battles_Monsters
	    WHERE Battle_List_Character_ID = ?
	    AND Battle_List_ID = Battle_Monster_Battle_ID
    ');

    $verifyBattleList->execute([$characterId]);

    while ($verifyBattle = $verifyBattleList->fetch()) {
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
            $verifyBattle['Battle_Monster_Monster_Gold']
        );
    }
    $verifyBattleList->closeCursor();

    return $monster;
}

function connexionChapter($bdd, $chapterID){
	$chapterListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Chapters WHERE Chapter_ID = ?
    ');
    $chapterListQuery->execute([$chapterID]);

    while ($chapterList = $chapterListQuery->fetch()) {
        $chapter = new Chapter(
            $chapterList['Chapter_ID'],
            $chapterList['Chapter_Number'],
            $chapterList['Chapter_Name'],
            $chapterList['Chapter_Opening'],
            $chapterList['Chapter_Ending'],
            $chapterList['Chapter_Defeate'],
            $chapterList['Chapter_Monster']
        );
    }
    $chapterListQuery->closeCursor();
    
    return $chapter;
}

function connexionTown($bdd, $town)
{
    if ($town == 0) {
        $town = new Town(
            0,
            'http://localhost',
            'None',
            'None',
            0,
            1
        );
    } else {
        $townsListQuery = $bdd->prepare('
            SELECT * FROM Caranille_Towns WHERE Town_ID = ?
        ');

        $townsListQuery->execute([$town]);

        while ($townsList = $townsListQuery->fetch()) {
            $town = new Town(
                $townsList['Town_ID'],
                $townsList['Town_Picture'],
                $townsList['Town_Name'],
                $townsList['Town_Description'],
                $townsList['Town_Price_INN'],
                $townsList['Town_Chapter']
            );
        }
        $townsListQuery->closeCursor();
    }

    return $town;
}

function deleteChatMessage($bdd, $accountAccess, $messageId, $chat6)
{
	if ($accountAccess = 2)
	{
		$Delete_Message = $bdd->prepare("DELETE FROM Caranille_Chat WHERE Chat_Message_ID = :messageId");
		$Delete_Message->execute(array('messageId' => $messageId));
		echo "$chat6";
	}
}

function DeleteMonsterBattle($bdd, $battleId)
{
    $deleteMonsterBattle = $bdd->prepare('
        DELETE FROM Caranille_Battles_Monsters WHERE Battle_Monster_Battle_ID = ?
    ');
    $deleteMonsterBattle->execute([$battleId]);

    $deleteBattleList = $bdd->prepare('
        DELETE FROM Caranille_Battles_List WHERE Battle_List_ID = ?
    ');

    $deleteBattleList->execute([$battleId]);

    $deleteMonsterBattle->closeCursor();
    $deleteBattleList->closeCursor();
}

function exitTown($bdd, $characterId)
{
    $updateAccount = $bdd->prepare('
        UPDATE Caranille_Characters SET Character_Town_ID = 0 WHERE Character_ID = :Character_ID
    ');
    $updateAccount->execute([
        'Character_ID' => $characterId,
    ]);

    $updateAccount->closeCursor();
}

function findBattle($bdd, $characterId)
{
    $idBattleQuery = $bdd->prepare('
        SELECT * FROM Caranille_Battles_List WHERE Battle_List_Character_ID = ?
    ');

    $idBattleQuery->execute([$characterId]);

    while ($idBattle = $idBattleQuery->fetch()) {
        $id = $idBattle['Battle_List_ID'];
    }
    $idBattleQuery->closeCursor();

    return $id;
}

function findIdByPseudo($bdd, $accountPseudo)
{
    $idListQuery = $bdd->prepare('
        SELECT Account_ID FROM Caranille_Accounts WHERE Account_Pseudo = ?
    ');
    $idListQuery->execute([$accountPseudo]);

    while ($idList = $idListQuery->fetch()) {
        $id = $idList['Account_ID'];
    }
    $idListQuery->closeCursor();

    return $id;
}

function findLevel($bdd, $characterLevel, $characterExperience, $characterId)
{
    $level = $characterLevel + 1;
    $levelFound = $bdd->prepare('
        SELECT * FROM Caranille_Levels WHERE Level_Number = ?
    ');

    $levelFound->execute([$level]);

    while ($levelData = $levelFound->fetch()) {
        $levelExperienceRequired = $levelData['Level_Experience'];
    }
    $levelFound->closeCursor();

    return $levelExperienceRequired;
}

function previewBattle($bdd, $monsterId)
{
    $monsterListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Monsters
	    WHERE Monster_ID = ?
    ');
    $monsterListQuery->execute([$monsterId]);

    while ($monsterList = $monsterListQuery->fetch()) {
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
            $monsterList['Monster_Gold']
        );
    }
    $monsterListQuery->closeCursor();

    return $monster;
}

function showAllChatMessages($bdd, $accountAccess, $chat0, $chat1, $chat2)
{
	echo "$chat0";
		echo '<table>';
			echo '<tr>';
				echo '<td>';
					echo "$chat1";
				echo '</td>';
				echo '<td>';
					echo "$chat2";
				echo '</td>';
		
			if ($accountAccess == 2){
				echo '<td>';
					echo 'Action';
				echo '</td>';
			}
		
		echo '</tr>';
		$Messages_Query = $bdd->query("SELECT * FROM Caranille_Chat, Caranille_Characters 
		WHERE Chat_Character_ID = Character_ID
		ORDER BY Chat_Message_ID DESC
		LIMIT 0, 10");
		while ($Messages = $Messages_Query->fetch())
		{
			echo '</tr>';

			$character = stripslashes($Messages['Character_Last_Name']). " " .stripslashes($Messages['Character_First_Name']);
			$messageId = stripslashes($Messages['Chat_Message_ID']);

			echo '<td>';
				 echo "<div class=\"important\">$character</div>"; 
			echo '</td>';
		
			echo '<td>';
				 echo stripslashes($Messages['Chat_Message']); 
			echo '</td>';
		
		
			if ($accountAccess == "2")
			{
			
				echo '<td>';
					echo '<form method="POST" action="Delete.php">';
					 echo "<input type=\"hidden\" name=\"messageId\" value=\"$messageId\">"; 
					echo '<input type="submit" name="Delete" value="X">';
					echo '</form>';
				echo '</td>';
			}
			echo '<br>';
		}
		$Messages_Query->closeCursor();
		echo '</table><br />';
}

function showChapter($bdd, $characterChapter, $story1){
	$chapterQuery = $bdd->prepare("SELECT * FROM Caranille_Chapters
	WHERE Chapter_Number = ?");
	$chapterQuery->execute([$characterChapter]);
	while ($chapterLevel = $chapterQuery->fetch()){
		$chapter = connexionChapter($bdd, $chapterLevel['Chapter_ID']);
		
		echo $chapter->getName(). "<br />";
		echo $chapter->getOpening(). "<br />";
		echo '<form method="POST" action="Story.php">';
		echo "<input type=\"submit\" name=\"Start\" value=\"$story1\">";
		echo '</form><br /><br />';
	}
	$chapterQuery->closeCursor();
}

function showAllPlayers($bdd, $top0, $top1, $top2, $top3, $top4, $top5, $top6, $top7, $top8, $top9)
{
    echo "$top0";
    echo '<table>';
    echo '<td>';
    echo "$top1";
    echo '</td>';

    echo '<td>';
    echo "$top2";
    echo '</td>';

    echo '<td>';
    echo "$top3";
    echo '</td>';

    echo '<td>';
    echo "$top4";
    echo '</td>';

    echo '<td>';
    echo "$top5";
    echo '</td>';

    echo '<td>';
    echo "$top6";
    echo '</td>';

    echo '<td>';
    echo "$top7";
    echo '</td>';

    echo '<td>';
    echo "$top8";
    echo '</td>';

    echo '<td>';
    echo "$top9";
    echo '</td>';

    echo '</tr>';

    $accountQuery = $bdd->query('
        SELECT * FROM Caranille_Characters
	    ORDER BY Character_Level DESC
	    LIMIT 0, 99
    ');

    while ($account = $accountQuery->fetch()) {
        $accountId = stripslashes($account['Character_ID']);

        echo '<tr>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Level']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Last_Name']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_First_Name']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_HP']).'/'.stripslashes($account['Character_HP_MAX']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_MP']).'/'.stripslashes($account['Character_MP_MAX']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Strength']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Magic']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Agility']).'';
        echo '</td>';

        echo '<td>';
        echo ''.stripslashes($account['Character_Defense']).'';
        echo '</td>';

        echo '</tr>';
    }
    $accountQuery->closeCursor();

    echo '</table>';
}

function showBattleMonsters($bdd, $dungeon1, $townId, $monsterType)
{
    $monsterListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Towns_Monsters
        WHERE Towns_ID = ?
    ');
    $monsterListQuery->execute([$townId]);

    while ($monsterList = $monsterListQuery->fetch()) {
    	
        $monsterID = stripslashes($monsterList['Monsters_ID']);
        $monster = connexionMonster($bdd, $monsterID);
	
        $monsterPicture = stripslashes($monster->getPicture());
        echo "<img src=\"$monsterPicture\"><br />";
        echo ''.stripslashes($monster->getName()).'<br />';
        echo ''.stripslashes(nl2br($monster->getDescription())).'<br />';
        echo 'Niveau: '.stripslashes($monster->getLevel()).'<br />';
        echo 'HP: '.stripslashes($monster->getHP()).'<br />';
        echo 'MP: '.stripslashes($monster->getMP()).'<br />';
        echo '<form method="POST" action="Dungeon.php">';
        echo "<input type=\"hidden\" name=\"Monster_ID\" value=\"$monsterID\">";
        echo "<input type=\"submit\" name=\"Battle\" value=\"$dungeon1\">";
        echo '</form><br />';
    }
    $monsterListQuery->closeCursor();
}

function showNews($bdd, $main0, $main1)
{
    $newsList = $bdd->query('
        SELECT * FROM Caranille_News ORDER BY News_ID desc
    ');

    while ($news = $newsList->fetch()) {
        echo '<br /><table>';
            echo '<tr>';
                echo '<th>';
                    echo "{$main0} {$news['News_Date']} {$main1} {$news['News_Account_Pseudo']}";
                echo '</th>';
            echo '</tr>';

            echo '<tr>';
                echo '<td>';
                    echo "<h4>{$news['News_Title']}</h4>";
                    echo stripslashes(nl2br($news['News_Message']));
                echo '</td>';
            echo '</tr>';
        echo '</table><br /><br />';
    }
    $newsList->closeCursor();
}

function showTownsList($bdd, $chapter, $map1)
{
    $findTowns = $bdd->prepare('
        SELECT * FROM Caranille_Towns
	    WHERE Town_Chapter <= ?
    ');

    $findTowns->execute([$chapter]);

    while ($towns = $findTowns->fetch()) {
        $townPicture = stripslashes($towns['Town_Picture']);
        echo "<img src=\"$townPicture\"><br />";
        echo ''.stripslashes($towns['Town_Name']).'<br />';
        $townId = stripslashes($towns['Town_ID']);
        echo '<form method="POST" action="Map.php">';
        echo "<input type=\"hidden\" name=\"Town_ID\" value=\"$townId\">";
        echo "<input type=\"submit\" name=\"entrer_Town\" value=\"$map1\">";
        echo '</form><br />';
    }
    $findTowns->closeCursor();
}

function showPresentation($bdd){
    $recherchePresentation = $bdd->query("SELECT Configuration_Presentation FROM caranille_configuration")->fetch();
    echo stripslashes(nl2br($recherchePresentation));
    $recherchePresentation->closeCursor();
}

function searchAccount($bdd, $pseudo){
	
    $searchAccount = $bdd->prepare("SELECT * FROM Caranille_Accounts WHERE Account_Pseudo = ?");
    $searchAccount->execute(array($pseudo));
	
    $account = $searchAccount->fetch();
    $searchAccount->closeCursor();
    
    return $account;
}

function updateCharacterTownId($bdd, $townId, $characterId)
{
    $updateAccount = $bdd->prepare('
        UPDATE Caranille_Characters
        SET Character_Town_ID = :Town_ID
        WHERE Character_ID = :Character_ID
    ');

    $updateAccount->execute([
        'Town_ID' => $townId,
        'Character_ID' => $characterId,
    ]);

    $updateAccount->closeCursor();
}

function updateBattleMonster(
    $bdd,
    $monsterId,
    $monsterPicture,
    $monsterName,
    $monsterDescription,
    $monsterLevel,
    $monsterHp,
    $monsterMp,
    $monsterStrength,
    $monsterMagic,
    $monsterAgility,
    $monsterDefense,
    $monsterExperience,
    $monsterGold,
    $battleId
) {
    $updateMonster = $bdd->prepare('
        UPDATE Caranille_Battles_Monsters
        SET Battle_Monster_Monster_ID = :Monster_ID,
	        Battle_Monster_Monster_Picture = :Monster_Picture,
            Battle_Monster_Monster_Name = :Monster_Name,
            Battle_Monster_Monster_Description = :Monster_Description,
            Battle_Monster_Monster_Level = :Monster_Level,
            Battle_Monster_Monster_HP = :Monster_HP,
            Battle_Monster_Monster_MP = :Monster_MP,
            Battle_Monster_Monster_Strength = :Monster_Strength,
            Battle_Monster_Monster_Magic = :Monster_Magic,
            Battle_Monster_Monster_agility = :Monster_Agility,
            Battle_Monster_Monster_Defense = :Monster_Defense,
            Battle_Monster_Monster_Experience = :Monster_Experience,
            Battle_Monster_Monster_Gold = :Monster_Gold
        WHERE Battle_Monster_Battle_ID = :Battle_ID
    ');

    $updateMonster->execute([
        'Monster_ID' => $monsterId,
        'Monster_Picture' => $monsterPicture,
        'Monster_Name' => $monsterName,
        'Monster_Description' => $monsterDescription,
        'Monster_Level' => $monsterLevel,
        'Monster_ID' => $monsterId,
        'Monster_HP' => $monsterHp,
        'Monster_MP' => $monsterMp,
        'Monster_Strength' => $monsterStrength,
        'Monster_Magic' => $monsterMagic,
        'Monster_Agility' => $monsterAgility,
        'Monster_Defense' => $monsterDefense,
        'Monster_Experience' => $monsterExperience,
        'Monster_Gold' => $monsterGold,
        'Battle_ID' => $battleId,
    ]);

    $updateMonster->closeCursor();
}

function useInn($bdd, $townPriceInn, $characterId)
{
    $updateAccount = $bdd->prepare('
        UPDATE Caranille_Characters
        SET Character_Gold = Character_Gold - :Town_Price_INN,
            Character_HP = Character_HP_Max,
            Character_MP = Character_MP_MAX
        WHERE Character_ID = :Character_ID
    ');

    $updateAccount->execute([
        'Town_Price_INN' => $townPriceInn,
        'Character_ID' => $characterId,
    ]);

    $updateAccount->closeCursor();
}

function verifyBattle($bdd, $characterId)
{
    $verifyBattleList = $bdd->prepare('
        SELECT * FROM Caranille_Battles_List, Caranille_Battles_Monsters
        WHERE Battle_List_Character_ID = ?
        AND Battle_List_ID = Battle_Monster_Battle_ID
    ');

    $verifyBattleList->execute([$characterId]);

    $verifyBattle = $verifyBattleList->rowCount();
    $verifyBattleList->closeCursor();

    return $verifyBattle;
}

function verifyConnection($bdd, $accountPseudo, $accountPassword)
{
    $accountListQuery = $bdd->prepare('
        SELECT * FROM Caranille_Accounts WHERE Account_Pseudo = ? AND Account_Password = ?
    ');

    $accountListQuery->execute([$accountPseudo, $accountPassword]);

    $accountList = $accountListQuery->rowCount();
    $accountListQuery->closeCursor();

    return $accountList;
}

function verifyTown($bdd, $characterTown)
{
    $verifyTownAccess = $bdd->prepare('
        SELECT * FROM Caranille_Towns WHERE Town_Chapter <= ?
    ');
    $verifyTownAccess->execute([$characterTown]);

    $verifyTown = $verifyTownAccess->rowCount();
    $verifyTownAccess->closeCursor();

    return $verifyTown;
}
