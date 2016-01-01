<?php
//DELETE
function deleteItemTown($bdd, $townItemID)
{
	$deleteTownItem = $bdd->prepare('DELETE FROM Caranille_Towns_Items 
	WHERE Town_Item_ID = ?');
    $deleteTownItem->execute([$townItemID]);
    $deleteTownItem->closeCursor();
}

//INSERT
function addItemTown($bdd, $townID, $itemID)
{
	$addItemTown = $bdd->prepare("INSERT INTO Caranille_Towns_Items VALUES(
    '',
    :itemID,
    :townID
    )");

    $addItemTown->execute([
    'itemID' => $itemID,
    'townID' => $townID]);

    $addItemTown->closeCursor();
}

//SELECT
function showAllItemsList($bdd, $ID)
{
	?>
	<select name="itemID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Items") as $itemList) 
	{
        $itemName = stripslashes($itemList['Item_Name']);
        $itemID = stripslashes($itemList['Item_ID']);
        
        if ($itemID == $ID)
        {
        	?>
    		<option value="<?= $itemID ?>" selected><?= $itemName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $itemID ?>"><?= $itemName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

function showItemTown($bdd, $townID)
{
	global $atown27, $atown28;
	
	$showItemTown = $bdd->prepare('SELECT * FROM Caranille_Towns_Items 
	WHERE Town_Item_Town_ID = ? 
	ORDER BY Town_Item_ID desc');
	
    $showItemTown->execute([$townID]);
    ?>
	<br><table class="table">
		<tr>
			<th><?= $atown28 ?></th>
            <th></th>
        </tr>
    <?php
    while ($item = $showItemTown->fetch()) 
    {
		$itemID = $item['Town_Item_Item_ID'];
		$townItemID = $item['Town_Item_ID']; ?>
        <tr>
            <td>
            	<?php echo newItem($bdd, $itemID)->getName() ?>
            </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="townID" value="<?= $townID ?>">
            		<input type="hidden" name="townItemID" value="<?= $townItemID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $atown27 ?>">
            	</form>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    $showItemTown->closeCursor();
}