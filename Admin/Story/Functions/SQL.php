<?php
//DELETe
function deleteChapter($bdd, $chapterID)
{
	$deleteChapter = $bdd->prepare('DELETE FROM Caranille_Chapters
	WHERE Chapter_ID = ?');
    $deleteChapter->execute([$chapterID]);
    $deleteChapter->closeCursor();	
}

//INSERT
function addChapter($bdd, $chapterNumber, $chapterName, $chapterOpening, $chapterEnding, $chapterDefeate, $monsterID)
{
	$addChapter = $bdd->prepare("INSERT INTO Caranille_Chapters VALUES(
    '',
    :chapterNumber,
    :chapterName,
    :chapterOpening,
    :chapterEnding,
    :chapterDefeate,
    :monsterID)");

    $addChapter->execute([
    'chapterNumber' => $chapterNumber,
    'chapterName' => $chapterName,
    'chapterOpening' => $chapterOpening,
    'chapterEnding' => $chapterEnding,
    'chapterDefeate' => $chapterDefeate,
    'monsterID' => $monsterID]);

    $addChapter->closeCursor();
}

//SELECT
function showAllChapter($bdd)
{
	global $achapter3, $achapter4, $achapter5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Chapters") as $chapterList) 
	{
        $chapterID = stripslashes($chapterList['Chapter_ID']); ?>
        <?= $achapter3 ?> : <b> <?= stripslashes($chapterList['Chapter_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="chapterID" value="<?= $chapterID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $achapter4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="chapterID" value="<?= $chapterID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $achapter5 ?>">
    	</form>
        <hr>
        <?php
    }
}

function showAllMonstersList($bdd, $id)
{
	?>
	<select name="monsterID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Monsters") as $monsterList) 
	{
        $monsterName = stripslashes($monsterList['Monster_Name']);
        $monsterID = stripslashes($monsterList['Monster_ID']);
        
        if($monsterID == $id)
        {
        	?>
    		<option value="<?= $monsterID ?>" selected><?= $monsterName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $monsterID ?>"><?= $monsterName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

//UPDATE
function updateChapter($bdd, $chapterNumber, $chapterName, $chapterOpening, $chapterEnding, $chapterDefeate, $monsterID, $chapterID)
{
	$updateChapter = $bdd->prepare('UPDATE Caranille_Chapters 
	SET Chapter_Number = :chapterNumber, 
	Chapter_Name = :chapterName, 
	Chapter_Opening = :chapterOpening,
	Chapter_Ending = :chapterEnding,
	Chapter_Defeate = :chapterDefeate,
	Chapter_Monster = :monsterID
	WHERE Chapter_ID = :chapterID');
	
	$updateChapter->execute([
    'chapterNumber' => $chapterNumber,
    'chapterName' => $chapterName,
    'chapterOpening' => $chapterOpening,
    'chapterEnding' => $chapterEnding,
    'chapterDefeate' => $chapterDefeate,
    'monsterID' => $monsterID,
    'chapterID' => $chapterID]);
    
    $updateChapter->closeCursor();
}
