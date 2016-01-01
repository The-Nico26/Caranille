<?php
//INSERT
function addItem($bdd, $itemID, $characterID)
{
	global $itemShop12;
	global $itemShop17;
	
	$addItem = $bdd->prepare("INSERT INTO Caranille_Inventory_Items VALUES('', :characterID, :itemID)");
	$addItem->execute(array('characterID'=> $characterID, 'itemID'=> $itemID)); ?>
	
	<?= $itemShop12 ?><br><br>
	<form method="POST" action="index.php">
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $itemShop17 ?>">
	</form>
	<?php
	$addItem->closeCursor();
}

//SELECT
function canBePurchased($bdd, $itemID, $characterTownID)
{
	$Item_List_Query = $bdd->prepare("SELECT * FROM Caranille_Items, Caranille_Towns_Items
	WHERE Town_Item_Item_ID = Item_ID
	AND Town_Item_Town_ID = ?
	AND Item_ID = ?");
	$Item_List_Query->execute([$characterTownID, $itemID]);
	$Item_Query = $Item_List_Query->rowCount();
	
	return $Item_Query;
}

function showAllItems($bdd, $townID)
{
	global $itemShop2, $itemShop3, $itemShop6, $itemShop7;
	$itemQuery = $bdd->prepare("SELECT * FROM Caranille_Items, Caranille_Towns_Items
	WHERE Town_Item_Item_ID = Item_ID
	AND Town_Item_Town_ID = ? 
	AND Item_Type = 'Magic' 
	OR Item_Type = 'Health'
	OR Item_Type = 'Parchment'");
	$itemQuery->execute([$townID]);	?>
	
	<?php
	while ($item = $itemQuery->fetch())
	{
		$itemID = stripslashes($item['Item_ID']);
		$itemPicture = stripslashes($item['Item_Picture']); ?>
		
		<table class="table">
			<tr>
				<td>
					<?= $itemShop2 ?>
				</td>
			
				<td>
					<?= stripslashes($item['Item_Name']) ?><br>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $itemShop3 ?>
				</td>
			
				<td>
					<?= stripslashes($item['Item_Description']) ?>
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $itemShop6 ?>
				</td>
			
				<td>
					<form method="POST" action="BuyItem.php">
					<input type="hidden" name="itemID" value="<?= $itemID ?>">
					<input type="submit" class="btn btn-success" name="Buy" value="<?= $itemShop7 ?>">
					</form>
				</td>
			</tr>
		</table>
		<?php
	}
	$itemQuery->closeCursor();
	echo '</table>';
}

//UPDATE
function updateCharacterGold($bdd, $gold, $characterID)
{
	$Update_Account = $bdd->prepare("UPDATE Caranille_Characters SET Character_Gold= :gold WHERE Character_ID= :characterID");
	$Update_Account->execute(array('gold'=> $gold, 'characterID'=> $characterID));
}