<?php
function ShowTownsList($bdd, $chapter)
{
	global $map1;
    $findTowns = $bdd->prepare('SELECT * FROM Caranille_Towns
	WHERE Town_Chapter <= ?');
    $findTowns->execute([$chapter]);
    while ($towns = $findTowns->fetch()) 
    {
        $townPicture = stripslashes($towns['Town_Picture']);
        $townID = stripslashes($towns['Town_ID']); ?>
        
        <img src="<?= $townPicture ?>" alt=""><br />
        <?= stripslashes($towns['Town_Name']) ?><br />
        <form method="POST" action="Map.php">
        <input type="hidden" name="townID" value="<?= $townID ?>">
        <input type="submit" value="<?= $map1 ?>">
        </form><br />
        <?php
    }
    $findTowns->closeCursor();
}

function updateCharacterTownId($bdd, $townID, $characterID)
{
    $updateAccount = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Town_ID = :Town_ID
    WHERE Character_ID = :Character_ID');

    $updateAccount->execute([
    'Town_ID' => $townID,
    'Character_ID' => $characterID]);

    $updateAccount->closeCursor();
}