<?php
//DELETE
function deleteParchment($bdd, $parchmentID)
{
	$Parchment = $bdd->prepare('DELETE FROM Caranille_Items
	WHERE Item_ID = ?');
    $Parchment->execute([$parchmentID]);
    $Parchment->closeCursor();
}

//INSERT
function addParchment($bdd, $parchmentPicture, $parchmentType, $parchmentLevel, $parchmentName, $parchmentDescription, $parchmentHP, $parchmentMP, $parchmentStrength, $parchmentMagic
	, $parchmentAgility, $parchmentDefense, $parchmentWisdom, $parchmentPurchase, $parchmentSale)
{
	$addParchment = $bdd->prepare("INSERT INTO Caranille_Items VALUES(
	'',
	:itemPicture,
	:itemType, 
	:itemLevel,
	:itemName,
	:itemDescription,
	:itemHP,
	:itemMP,
	:itemStrength,
	:itemMagic,
	:itemAgility,
	:itemDefense,
	:itemWisdom,
	:itemPurchase,
	:itemSale)");
	
	$addParchment->execute([
	'itemPicture' => $parchmentPicture,
	'itemType' => $parchmentType,
	'itemLevel' => $parchmentLevel,
	'itemName' => $parchmentName,
	'itemDescription' => $parchmentDescription,
	'itemHP' => $parchmentHP,
	'itemMP' => $parchmentMP,
	'itemStrength' => $parchmentStrength,
	'itemMagic' => $parchmentMagic,
	'itemAgility' => $parchmentAgility,
	'itemDefense' => $parchmentDefense,
	'itemWisdom' => $parchmentWisdom,
	'itemPurchase' => $parchmentPurchase,
	'itemSale' => $parchmentSale
	]);
	
	$addParchment->closeCursor();
}

//SELECT
function showAllParchments($bdd)
{
	global $aparchment3, $aparchment4, $aparchment5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Items
	WHERE Item_Type = 'Parchment'") as $item) 
	{
        $parchmentID = stripslashes($item['Item_ID']); ?>
        <?= $aparchment3 ?> : <b> <?= stripslashes($item['Item_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="parchmentID" value="<?= $parchmentID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aparchment4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="parchmentID" value="<?= $parchmentID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aparchment5 ?>">
    	</form>
        <hr>
        <?php
    }
}

//UPDATE
function updateParchment($bdd, $parchmentID, $parchmentPicture, $parchmentLevel, $parchmentName, $parchmentDescription, $parchmentHP, $parchmentMP, $parchmentStrength, $parchmentMagic, $parchmentAgility, $parchmentDefense, $parchmentWisdom, $parchmentPurchase, $parchmentSale)
{
	$updateParchment = $bdd->prepare('UPDATE Caranille_Items 
	SET Item_Picture = :parchmentPicture,
	Item_Level_Required = :parchmentLevel, 
	Item_Name = :parchmentName,
	Item_Description = :parchmentDescription,
	Item_HP_Effect = :parchmentHP,
	Item_MP_Effect = :parchmentMP,
	Item_Strength_Effect = :parchmentStrength,
	Item_Magic_Effect = :parchmentMagic,
	Item_Agility_Effect = :parchmentAgility,
	Item_Defense_Effect = :parchmentDefense,
	Item_Sagesse_Effect = :parchmentWisdom,
	Item_Purchase_Price = :parchmentPurchase,
	Item_Sale_Price = :parchmentSale
	WHERE Item_ID = :parchmentID');
	
	$updateParchment->execute([
    'parchmentID' => $parchmentID,
    'parchmentPicture' => $parchmentPicture,
    'parchmentLevel' => $parchmentLevel,
    'parchmentName' => $parchmentName,
    'parchmentDescription' => $parchmentDescription,
    'parchmentHP' => $parchmentHP,
    'parchmentMP' => $parchmentMP,
    'parchmentStrength' => $parchmentStrength,
    'parchmentMagic' => $parchmentMagic,
    'parchmentAgility' => $parchmentAgility,
    'parchmentDefense' => $parchmentDefense,
    'parchmentWisdom' => $parchmentWisdom,
    'parchmentPurchase' => $parchmentPurchase,
    'parchmentSale' => $parchmentSale]);
    
    $updateParchment->closeCursor();
}