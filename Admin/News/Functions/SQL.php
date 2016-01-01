<?php
//DELETE
function deleteNews($bdd, $newID)
{
	$deleteNew = $bdd->prepare('DELETE FROM Caranille_News 
	WHERE News_ID = ?');
    $deleteNew->execute([$newID]);
    $deleteNew->closeCursor();
}

//SELECT
function showAllNews($bdd)
{
	global $anews3, $anews4, $anews5;
	
	foreach($bdd->query("SELECT * FROM Caranille_News") as $newList) 
	{
        $newID = stripslashes($newList['News_ID']); ?>
        <?= $anews3 ?> : <?= stripslashes($newList['News_Title']) ?><br />
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="newsID" value="<?= $newID ?>">
        	<input class="btn btn-info" type="submit" value="<?= $anews4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
        	<input type="hidden" name="newsID" value="<?= $newID ?>">
        	<input class="btn btn-info" type="submit" value="<?= $anews5 ?>">
        </form>
        <hr>
        <?php
    }
}

//INSERT
function addNews($bdd, $newTitle, $newMessage, $newAccountPseudo)
{
	$date = date('Y-m-d H:i:s');
    $addNew = $bdd->prepare("INSERT INTO Caranille_News VALUES(
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

//UPDATE
function updateNews($bdd, $newID, $newTitle, $newMessage, $newAccountPseudo, $newDate) 
{
    $updateNew = $bdd->prepare('UPDATE Caranille_News
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
