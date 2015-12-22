<?php
//DELETE
function deleteItem($bdd, $itemID)
{
	$deleteItem = $bdd->prepare('DELETE FROM Caranille_Items
	WHERE Item_ID = ?');
    $deleteItem->execute([$itemID]);
    $deleteItem->closeCursor();
}

//INSERT
function addItem($bdd, $itemPicture, $itemType, $itemLevel, $itemName, $itemDescription, $itemHP, $itemMP, $itemPurchase, $itemSale)
{
	$addItem = $bdd->prepare("INSERT INTO Caranille_Items VALUES(
	'',
	:itemPicture,
	:itemType, 
	:itemLevel,
	:itemName,
	:itemDescription,
	:itemHP,
	:itemMP,
	'0',
	'0',
	'0',
	'0',
	'0',
	:itemPurchase,
	:itemSale)");
	
	$addItem->execute([
	'itemPicture' => $itemPicture,
	'itemType' => $itemType,
	'itemLevel' => $itemLevel,
	'itemName' => $itemName,
	'itemDescription' => $itemDescription,
	'itemHP' => $itemHP,
	'itemMP' => $itemMP,
	'itemPurchase' => $itemPurchase,
	'itemSale' => $itemSale
	]);
	
	$addItem->closeCursor();
}

//SELECT
function showAllItems($bdd)
{
	global $aitem3, $aitem4, $aitem5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Items
	WHERE Item_Type = 'Magic'
	OR Item_Type = 'Health'") as $item) 
	{
        $itemID = stripslashes($item['Item_ID']); ?>
        <?= $aitem3 ?> : <b> <?= stripslashes($item['Item_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="itemID" value="<?= $itemID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aitem4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="itemID" value="<?= $itemID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aitem5 ?>">
    	</form>
        <hr>
        <?php
    }
}

//UPDATE
function updateItem($bdd, $itemID, $itemPicture, $itemType, $itemLevel, $itemName, $itemDescription, $itemHP, $itemMP, $itemPurchase, $itemSale)
{
	$updateItem = $bdd->prepare('UPDATE Caranille_Items 
	SET Item_Picture = :itemPicture,
	Item_Type = :itemType, 
	Item_Level_Required = :itemLevel, 
	Item_Name = :itemName,
	Item_Description = :itemDescription,
	Item_HP_Effect = :itemHP,
	Item_MP_Effect = :itemMP,
	Item_Purchase_Price = :itemPurchase,
	Item_Sale_Price = :itemSale
	WHERE Item_ID = :itemID');
	
	$updateItem->execute([
    'itemID' => $itemID,
    'itemPicture' => $itemPicture,
    'itemType' => $itemType,
    'itemLevel' => $itemLevel,
    'itemName' => $itemName,
    'itemDescription' => $itemDescription,
    'itemHP' => $itemHP,
    'itemMP' => $itemMP,
    'itemPurchase' => $itemPurchase,
    'itemSale' => $itemSale]);
    
    $updateItem->closeCursor();
}