<?php
//DELETE
function deleteMonsterTown($bdd, $townMonsterID)
{
	$deleteTownMonster = $bdd->prepare('DELETE FROM Caranille_Towns_Monsters 
	WHERE Town_Monster_ID = ?');
    $deleteTownMonster->execute([$townMonsterID]);
    $deleteTownMonster->closeCursor();
}

//INSERT
function addMonsterTown($bdd, $townID, $monsterID)
{
	$addMonsterTown = $bdd->prepare("INSERT INTO Caranille_Towns_Monsters VALUES(
    '',
    :monsterID,
    :townID
    )");

    $addMonsterTown->execute([
    'monsterID' => $monsterID,
    'townID' => $townID]);

    $addMonsterTown->closeCursor();
}

//SELECT
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

function showMonsterTown($bdd, $townID)
{
	global $atown19, $atown20;
	
	$showMonsterTown = $bdd->prepare('SELECT * FROM Caranille_Towns_Monsters 
	WHERE Town_Monster_Town_ID = ? 
	ORDER BY Town_Monster_ID desc');
	
    $showMonsterTown->execute([$townID]);
    ?>
	<br>
	<table class="table">
		<tr>
			<th><?= $atown20 ?></th>
            <th></th>
        </tr>
    <?php
    while ($monster = $showMonsterTown->fetch()) 
    {
		$monsterID = stripslashes($monster['Town_Monster_Monster_ID']);
		$townMonsterID = stripslashes($monster['Town_Monster_ID']); 
		?>
        <tr>
            <td>
            	<?php echo newMonster($bdd, $monsterID)->getName() ?>
            </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="townID" value="<?= $townID ?>">
            		<input type="hidden" name="townMonsterID" value="<?= $townMonsterID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $atown19 ?>">
            	</form>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    $showMonsterTown->closeCursor();
}