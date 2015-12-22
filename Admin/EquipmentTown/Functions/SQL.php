<?php
//DELETE
function deleteEquipmentTown($bdd, $townEquipmentID)
{
	$deleteTownItem = $bdd->prepare('DELETE FROM Caranille_Towns_Equipments
	WHERE Town_Equipment_ID = ?');
    $deleteTownItem->execute([$townEquipmentID]);
    $deleteTownItem->closeCursor();
}

//INSERT
function addEquipmentTown($bdd, $townID, $EquipmentID)
{
	$addEquipmentTown = $bdd->prepare("INSERT INTO Caranille_Towns_Equipments VALUES(
    '',
    :EquipmentID,
    :townID
    )");

    $addEquipmentTown->execute([
    'EquipmentID' => $EquipmentID,
    'townID' => $townID]);

    $addEquipmentTown->closeCursor();
}

//SELECT
function showAllEquipmentsList($bdd, $ID)
{ 
	?>
	<select name="EquipmentID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Equipments") as $EquipmentList) 
	{
        $EquipmentName = stripslashes($EquipmentList['Equipment_Name']);
        $EquipmentID = stripslashes($EquipmentList['Equipment_ID']);
        
        if ($EquipmentID == $ID)
        {
        	?>
    		<option value="<?= $EquipmentID ?>" selected><?= $EquipmentName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $EquipmentID ?>"><?= $EquipmentName ?></option>
        	<?php
        }
    } 
    ?>
    </select>
    <?php
}

function showEquipmentTown($bdd, $townID)
{
	global $atown33, $atown34;
	
	$showEquipmentTown = $bdd->prepare('SELECT * FROM Caranille_Towns_Equipments
	WHERE Town_Equipment_Town_ID = ? 
	ORDER BY Town_Equipment_ID desc');
	
    $showEquipmentTown->execute([$townID]); ?>
    
	<br><table class="table">
		<tr>
			<th><?= $atown34 ?></th>
            <th></th>
        </tr>
    <?php    
    while ($Equipment = $showEquipmentTown->fetch()) 
    {
		$EquipmentID = stripslashes($Equipment['Town_Equipment_Equipment_ID']);
		$townEquipmentID = stripslashes($Equipment['Town_Equipment_ID']);?>
		
        <tr>
            <td>
            	<?php echo newEquipment($bdd, $EquipmentID)->getName(); ?>
           </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="townID" value="<?= $townID ?>">
            		<input type="hidden" name="townEquipmentID" value="<?= $townEquipmentID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $atown33 ?>">
            	</form>
            </td>
        </tr>
            <?php
    }
    ?>
    </table>
    <?php
    $showEquipmentTown->closeCursor();
}