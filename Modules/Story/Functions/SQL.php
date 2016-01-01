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
    'Battle_Type' => $battleType,]);
    $addBattle->closeCursor();
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
    $addBattle = $bdd->prepare('INSERT INTO Caranille_Battles_Monsters VALUES(
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
    :Monster_Gold)');

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
    'Monster_Gold' => $monsterGold,]);
    $addBattle->closeCursor();
}

//SELECT
function showChapter($bdd, $characterChapter)
{
	global $story1;
	$chapterQuery = $bdd->prepare("SELECT * FROM Caranille_Chapters
	WHERE Chapter_Number = ?");
	$chapterQuery->execute([$characterChapter]);
	while ($chapterLevel = $chapterQuery->fetch())
	{
		$chapter = newChapter($bdd, $chapterLevel['Chapter_ID']); ?>
		<?php echo $chapter->getName() ?>
		<?php echo $chapter->getOpening() ?><br />
		<form method="POST" action="Story.php">
		<input type="submit" class="btn btn-success" name="Start" value="<?= $story1 ?>">
		</form><br /><br />
		<?php
	}
	$chapterQuery->closeCursor();
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
    $idBattleQuery = $bdd->prepare('SELECT * FROM Caranille_Battles_List 
    WHERE Battle_List_Character_ID = ?');
    $idBattleQuery->execute([$characterID]);
    while ($idBattle = $idBattleQuery->fetch()) 
    {
        $Battle = stripslashes($idBattle);
    }
    $idBattleQuery->closeCursor();
    return $Battle;
}