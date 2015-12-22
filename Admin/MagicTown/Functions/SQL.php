<?php
//DELETE
function deleteMagicTown($bdd, $magicID)
{
	$deleteMagicMonster = $bdd->prepare('DELETE FROM Caranille_Towns_Magics 
	WHERE Town_Magic_ID = ?');
    $deleteMagicMonster->execute([$magicID]);
    $deleteMagicMonster->closeCursor();
}

//INSERT
function addMagicTown($bdd, $townID, $magicID)
{
	$addMagicTown = $bdd->prepare("INSERT INTO Caranille_Towns_Magics VALUES(
    '',
    :magicID,
    :townID
    )");

    $addMagicTown->execute([
    'magicID' => $magicID,
    'townID' => $townID]);

    $addMagicTown->closeCursor();
}

//SELECT
function showAllMagicsList($bdd, $id)
{
	?>
	<select name="magicID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Magics") as $magicList) 
	{
        $magicName = stripslashes($magicList['Magic_Name']);
        $magicID = stripslashes($magicList['Magic_ID']);
        
        if ($magicID == $id)
        {
        	?>
    		<option value="<?= $magicID ?>" selected><?= $magicName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $magicID ?>"><?= $magicName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

function showMagicsTowns($bdd, $townID)
{
	global $atown19, $atown23;
	
	$showMagicTown = $bdd->prepare('SELECT * FROM Caranille_Towns_Magics 
	WHERE Town_Magic_Town_ID = ? 
	ORDER BY Town_Magic_ID desc');
	
    $showMagicTown->execute([$townID]);
    ?>
	<br>
	<table class="table">
		<tr>
			<th>Magic</th>
            <th></th>
        </tr>
    <?php
    while ($magic = $showMagicTown->fetch()) 
    {
		$magicID = stripslashes($magic['Town_Magic_Magic_ID']);
		$townMagicID = stripslashes($magic['Town_Magic_ID']);
		?>
        <tr>
            <td>
            	<?php echo newMagic($bdd, $magicID)->getName() ?>
           </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="townMagicID" value="<?= $townMagicID ?>">
            		<input type="hidden" name="townID" value="<?= $townID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $atown23 ?>">
            	</form>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    $showMagicTown->closeCursor();
}