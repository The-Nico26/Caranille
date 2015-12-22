<?php
//DELETE
function deleteEquipment($bdd, $equipmentID)
{
	$deleteequipment = $bdd->prepare('DELETE FROM Caranille_Equipments
	WHERE Equipment_ID = ?');
    $deleteequipment->execute([$equipmentID]);
    $deleteequipment->closeCursor();
}

//INSERT
function addEquipment($bdd, $equipmentPicture, $equipmentType, $equipmentLevel, $equipmentName, $equipmentDescription, $equipmentHP, $equipmentMP, $equipmentStrength, $equipmentMagic
	, $equipmentAgility, $equipmentDefense, $equipmentSagesse, $equipmentPurchase, $equipmentSale)
{
	$addEquipment = $bdd->prepare("INSERT INTO Caranille_Equipments VALUES(
	'',
	:equipmentPicture,
	:equipmentType, 
	:equipmentLevel,
	:equipmentName,
	:equipmentDescription,
	:equipmentHP,
	:equipmentMP,
	:equipmentStrength,
	:equipmentMagic,
	:equipmentAgility,
	:equipmentDefense,
	:equipmentSagesse,
	:equipmentPurchase,
	:equipmentSale)");
	
	$addEquipment->execute([
	'equipmentPicture' => $equipmentPicture,
	'equipmentType' => $equipmentType,
	'equipmentLevel' => $equipmentLevel,
	'equipmentName' => $equipmentName,
	'equipmentDescription' => $equipmentDescription,
	'equipmentHP' => $equipmentHP,
	'equipmentMP' => $equipmentMP,
	'equipmentStrength' => $equipmentStrength,
	'equipmentMagic' => $equipmentMagic,
	'equipmentAgility' => $equipmentAgility,
	'equipmentDefense' => $equipmentDefense,
	'equipmentSagesse' => $equipmentSagesse,
	'equipmentPurchase' => $equipmentPurchase,
	'equipmentSale' => $equipmentSale
	]);
	
	$addEquipment->closeCursor();
}

//SELECT
function showAllEquipments($bdd)
{
	global $aequipment3, $aequipment4, $aequipment5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Equipments") as $equipment) 
	{
        $equipmentID = stripslashes($equipment['Equipment_ID']); ?>
        <?= $aequipment3 ?><b> <?= stripslashes($equipment['Equipment_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="equipmentID" value="<?= $equipmentID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aequipment4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="equipmentID" value="<?= $equipmentID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $aequipment5 ?>">
    	</form>
        <hr>
        <?php
    }
}

//UPDATE
function updateEquipment($bdd, $equipmentID, $equipmentPicture, $equipmentType, $equipmentLevel, $equipmentName, $equipmentDescription, $equipmentHP, $equipmentMP, $equipmentStrength, $equipmentMagic, $equipmentAgility, $equipmentDefense, $equipmentSagesse, $equipmentPurchase, $equipmentSale)
{
	$updateequipment = $bdd->prepare('UPDATE Caranille_Equipments 
	SET equipment_Picture = :equipmentPicture,
	equipment_Type = :equipmentType, 
	equipment_Level_Required = :equipmentLevel, 
	equipment_Name = :equipmentName,
	equipment_Description = :equipmentDescription,
	equipment_HP_Effect = :equipmentHP,
	equipment_MP_Effect = :equipmentMP,
	equipment_Strength_Effect = :equipmentStrength,
	equipment_Magic_Effect = :equipmentMagic,
	equipment_Agility_Effect = :equipmentAgility,
	equipment_Defense_Effect = :equipmentDefense,
	equipment_Sagesse_Effect = :equipmentSagesse,
	equipment_Purchase_Price = :equipmentPurchase,
	equipment_Sale_Price = :equipmentSale
	WHERE equipment_ID = :equipmentID');
	
	$updateequipment->execute([
    'equipmentID' => $equipmentID,
    'equipmentPicture' => $equipmentPicture,
    'equipmentType' => $equipmentType,
    'equipmentLevel' => $equipmentLevel,
    'equipmentName' => $equipmentName,
    'equipmentDescription' => $equipmentDescription,
    'equipmentHP' => $equipmentHP,
    'equipmentMP' => $equipmentMP,
    'equipmentStrength' => $equipmentStrength,
    'equipmentMagic' => $equipmentMagic,
    'equipmentAgility' => $equipmentAgility,
    'equipmentDefense' => $equipmentDefense,
    'equipmentSagesse' => $equipmentSagesse,
    'equipmentPurchase' => $equipmentPurchase,
    'equipmentSale' => $equipmentSale]);
    
    $updateequipment->closeCursor();
}