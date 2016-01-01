<?php
//DELETE
function deleteMonstersDrops($bdd, $monsterDropID)
{
	$deleteMonsterDropID = $bdd->prepare('DELETE FROM Caranille_Monsters_Drops 
	WHERE Monster_Drop_ID = ?');
    $deleteMonsterDropID->execute([$monsterDropID]);
    $deleteMonsterDropID->closeCursor();
}

//INSERT
function addMonsterDrops($bdd, $monsterID, $itemID, $lucky, $type)
{
	$addMonsterTown = $bdd->prepare("INSERT INTO Caranille_Monsters_Drops VALUES(
    '',
    :monsterID,
    :itemID,
    :lucky
    :type
    )");

    $addMonsterTown->execute([
    'monsterID' => $monsterID,
    'itemID' => $itemID,
    'lucky' => $lucky,
    'type' => $type]);

    $addMonsterTown->closeCursor();
}
function showAllItemsList($bdd)
{
	?>
	<select name="itemID" class="form-control" >
    	<option value="0"> No Items</option>
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Items") as $itemList) 
	{
        $itemName = stripslashes($itemList['Item_Name']);
        $itemID = stripslashes($itemList['Item_ID']);
       
    	?>
    	<option value="<?= $itemID ?>"><?= $itemName ?></option>
    	<?php
    }
    ?>
    </select>
    <?php
}
function showAllEquipmentsList($bdd)
{
	?>
	<select name="equipmentID" class="form-control">
    	<option value="0">No Equipments</option>
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Equipments") as $equipmentList) 
	{
        $equipmentName = stripslashes($equipmentList['Equipment_Name']);
        $equipmentID = stripslashes($equipmentList['Equipment_ID']);
       
    	?>
    	<option value="<?= $equipmentID ?>"><?= $equipmentName ?></option>
    	<?php
    }
    ?>
    </select>
    <?php
}
function showMonsterDrops($bdd, $monsterID)
{
	global $atown19, $atown20, $amonsterDrop3;
	
	$showMonsterDrop = $bdd->prepare('SELECT * FROM Caranille_Monsters_Drops
	WHERE Monster_Drop_Monster_ID = ?
	');
	
    $showMonsterDrop->execute([$monsterID]); ?>
	<br>
	<table class="table">
		<tr>
			<th></th>
            <th></th>
            <th></th>
        </tr>
    <?php
    while ($item = $showMonsterDrop->fetch()) 
    {
		$monsterDropID = stripslashes($item['Monster_Drop_ID']); ?>
        <tr>
            <td>
            	<?=  newItem($bdd, $item['Monster_Drop_Item_ID'])->getName() ?>
            </td>
            <td>
            	<?= $item['Monster_Drop_Luck']."/1000" ?>
            </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="monsterDropID" value="<?= $monsterDropID ?>">
            		<input type="hidden" name="monsterID" value="<?= $monsterID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $amonsterDrop3 ?>">
            	</form>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    $showMonsterDrop->closeCursor();
}