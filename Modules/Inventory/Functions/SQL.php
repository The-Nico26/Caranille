<?php
//DELETE
function deleteItem($bdd, $itemID, $characterID)
{
	$deleteItem = $bdd->prepare("DELETE FROM Caranille_Inventory_Items
    WHERE Inventory_Item_Character_ID = :characterID
    AND Inventory_Item_Item_ID = :itemID
    LIMIT 1");
    $deleteItem->execute(['characterID'=> $characterID, 'itemID'=> $itemID]);
    $deleteItem->closeCursor();
}

//UPDATE
function addStats($bdd, $parchmentHP, $parchmentMP, $parchmentStrength, $parchmentMagic, $parchmentAgility, $parchmentDefense, $parchmentWisdom, $characterID)
{
	$addStats = $bdd->prepare('UPDATE Caranille_Characters 
	SET Character_HP_Parchment = Character_HP_Parchment + :parchmentHP,
    Character_MP_Parchment = Character_MP_Parchment + :parchmentMP,
    Character_Strength_Parchment = Character_Strength_Parchment + :parchmentStrength,
    Character_Magic_Parchment = Character_Magic_Parchment + :parchmentMagic,
    Character_Agility_Parchment = Character_Agility_Parchment + :parchmentAgility,
    Character_Defense_Parchment = Character_Defense_Parchment + :parchmentDefense,
   	Character_Wisdom_Parchment = Character_Wisdom_Parchment + :parchmentWisdom
   	WHERE Character_ID = :characterID');
	$addStats->execute([
	'parchmentHP' => $parchmentHP,	
	'parchmentMP' => $parchmentMP,
	'parchmentStrength' => $parchmentStrength,
	'parchmentMagic' => $parchmentMagic,
	'parchmentAgility' => $parchmentAgility,
	'parchmentDefense' => $parchmentDefense,
	'parchmentWisdom' => $parchmentWisdom,
	'characterID' => $characterID]);
	$addStats->closeCursor();
}

function initialEquip($bdd, $characterID, $itemType, $equip)
{
	$updateEquip = $bdd->prepare("UPDATE Caranille_Inventory_Equipments, Caranille_Equipments
	SET Inventory_Equipment_Equipped = :equip
	WHERE Inventory_Equipment_Character_ID = :characterID
	AND Inventory_Equipment_Equipment_ID = Equipment_ID
	AND Equipment_Type = :itemType");
					
	$updateEquip->execute(array('equip' => $equip, 'characterID' => $characterID, 'itemType' => $itemType));
	$updateEquip->closeCursor();
}

function updateEquip($bdd, $characterID, $itemID, $equip)
{
	$updateEquip = $bdd->prepare("UPDATE Caranille_Inventory_Equipments SET Inventory_Equipment_Equipped = :equip
	WHERE Inventory_Equipment_Character_ID = :characterID
	AND Inventory_Equipment_Equipment_ID = :itemID");
					
	$updateEquip->execute(array('equip' => $equip, 
	'characterID' => $characterID, 
	'itemID' => $itemID));
	$updateEquip->closeCursor();
}

function updateStats($bdd, $characterID)
{
	$update = $bdd->prepare('UPDATE Caranille_Characters 
	SET Character_HP_Equipment = 0,
    Character_MP_Equipment = 0,
    Character_Strength_Equipment = 0,
    Character_Magic_Equipment = 0,
    Character_Agility_Equipment = 0,
    Character_Defense_Equipment = 0,
   	Character_Wisdom_Equipment = 0
   	WHERE Character_ID = :characterID');
	$update->execute(['characterID' => $characterID]);
	$update->closeCursor();
	
	$updateAccount = $bdd->prepare('SELECT * FROM Caranille_Inventory_Equipments
	WHERE Inventory_Equipment_Equipped = 1
	AND Inventory_Equipment_Character_ID = ?');
	$updateAccount->execute([$characterID]);
	
	while($item = $updateAccount->fetch())
	{
		$update = $bdd->prepare('UPDATE Caranille_Characters 
		SET Character_HP_Equipment = Character_HP_Equipment + :itemHP,
	    Character_MP_Equipment = Character_MP_Equipment + :itemMP,
	    Character_Strength_Equipment = Character_Strength_Equipment + :itemStrength,
	    Character_Magic_Equipment = Character_Magic_Equipment + :itemMagic,
	    Character_Agility_Equipment = Character_Agility_Equipment + :itemAgility,
	    Character_Defense_Equipment = Character_Defense_Equipment + :itemDefense,
	   	Character_Wisdom_Equipment = Character_Wisdom_Equipment + :itemWisdom
	   	WHERE Character_ID = :characterID');
	   	$ite = newEquipment($bdd, $item['Inventory_Equipment_Equipment_ID']);
	   	$update->execute([
	   	'itemHP' => $ite->getHP(),
	   	'itemMP' => $ite->getMP(),
	   	'itemStrength' => $ite->getStrength(),
	   	'itemMagic' => $ite->getMagic(),
	   	'itemAgility' => $ite->getAgility(),
	   	'itemDefense' => $ite->getDefense(),
	   	'itemWisdom' => $ite->getSagesse(),
	   	'characterID' => $characterID]);
	   	$update->closeCursor();
	}
}

function updateStates($bdd, $characterID, $itemHP, $itemMP, $itemStrength, $itemMagic, $itemAgility, $itemDefense, $itemWisdom)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_HP_Equipment = :itemHP,
    Character_MP_Equipment = :itemMP,
    Character_Strength_Equipment = :itemStrength,
    Character_Magic_Equipment = :itemMagic,
    Character_Agility_Equipment = :itemAgility,
    Character_Defense_Equipment = :itemDefense,
   	Character_Wisdom_Equipment = :itemWisdom
    WHERE Character_ID = :Character_ID');
    
    $updateAccount->execute([
    'itemHP' => $itemHP,
    'itemMP' => $itemMP,
    'itemMagic' => $itemMagic,
    'itemAgility' => $itemAgility,
    'itemDefense' => $itemDefense,
    'itemWisdom' => $itemWisdom,
    'Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}

function updateInventoryEquipment($bdd, $inventoryID)
{
	$updateInventory =  $bdd->prepare("UPDATE Caranille_Inventory_Equipments SET Inventory_Equipment_Quantity = Inventory_Equipment_Quantity - 1
	WHERE Inventory_Equipment_ID = :inventoryID");
	$updateInventory ->execute(array('inventoryID'=> $inventoryID));
}

//DELETE
function deleteInventoryEquipment($bdd, $inventoryID)
{
	$deleteAccount = $bdd->prepare("DELETE FROM Caranille_Inventory_Equipments WHERE Inventory_Equipment_ID = :inventoryID");
	$deleteAccount->execute(array('inventoryID' => $inventoryID));
}

//SELECT
function verifyEquipID($bdd, $characterID, $itemType)
{
	$verifyEquip = $bdd->prepare("SELECT * FROM Caranille_Equipments, Caranille_Inventory_Equipments
	WHERE Inventory_Equipment_Equipped = 1
	AND Inventory_Equipment_Character_ID = ?
	AND Equipment_Type = ?");
	$verifyEquip->execute([ $characterID, $itemType]);
	$item = $verifyEquip->fetch();
	return $item;
}

function verifyEquip($bdd, $characterID, $itemType, $equipmentID, $equip)
{
	$verifyEquip = $bdd->prepare("SELECT * FROM Caranille_Equipments, Caranille_Inventory_Equipments
	WHERE Inventory_Equipment_Equipped = ?
	AND Inventory_Equipment_Character_ID = ?
	AND Inventory_Equipment_Equipment_ID = ?
	AND Equipment_Type = ?");
	$verifyEquip->execute([$equip, $characterID, $equipmentID, $itemType]);
	$item = $verifyEquip->fetch();
	return $item;
}

function showAllEquipments($bdd, $characterID, $itemType)
{
	global $inventory11, $inventory12, $inventory13, $inventory14, $inventory15, $inventory15, $inventory16, $inventory17, $inventory19, $inventory20, $inventory21, $inventory22, $inventory24, $inventory25, $inventory26, $inventory35;

	$Item_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Equipments, Caranille_Equipments
	WHERE  Inventory_Equipment_Equipment_ID = Equipment_ID
	AND Equipment_Type = ?
	AND Inventory_Equipment_Character_ID = ?
	ORDER BY Equipment_Name");
	$Item_Query->execute([$itemType, $characterID]);
	
	while ($Item = $Item_Query->fetch())
	{
		$ID = stripslashes($Item['Equipment_ID']);
		$name = stripslashes($Item['Equipment_Name']);
		$description = stripslashes($Item['Equipment_Description']);
		$levelRequired = stripslashes($Item['Equipment_Level_Required']);
		$itemQuantity = $Item['Inventory_Equipment_Quantity'];
		$HPEffect = stripslashes($Item['Equipment_HP_Effect']);
		$MPEffect = stripslashes($Item['Equipment_MP_Effect']);
		$StrengthEffect = stripslashes($Item['Equipment_Strength_Effect']);
		$inventoryID = stripslashes($Item['Inventory_Equipment_ID']);
		$magicEffect = stripslashes($Item['Equipment_Magic_Effect']);
		$agilityEffect = stripslashes($Item['Equipment_Agility_Effect']);
		$defenseEffect = stripslashes($Item['Equipment_Defense_Effect']);
		$salePrice = stripslashes($Item['Equipment_Sale_Price']);?>
		
		<table class="table">
		
			<tr>
				<td>
					<?= $inventory11 ?>
				</td>
			
				<td>
					<?= $name ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory12 ?>
				</td>
			
				<td>
					<?= $description ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory13 ?>
				</td>
			
				<td>
					<?= $levelRequired ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory14 ?>
				</td>
			
				<td>
					<?= $itemQuantity ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory15 ?>
				</td>
			
				<td>
					<?= '+' .$HPEffect. ' HP' ?><br />
					<?= '+' .$MPEffect. ' MP' ?><br />
					<?= '+' .$StrengthEffect. " $inventory19" ?><br />
					<?= '+' .$magicEffect. " $inventory20" ?><br />
					<?= '+' .$agilityEffect. " $inventory21" ?><br />
					<?= '+' .$defenseEffect. " $inventory22" ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory16 ?>
				</td>
			
				<td>
					<?= $salePrice ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $inventory17 ?>
				</td>
			
				<td>
					<?php
					if($itemType == 'Armor' || $itemType == 'Boots' || $itemType == 'Gloves' || $itemType == 'Helmet' || $itemType == 'Weapon')
					{
						?>
						<form method="POST" action="Inventory.php">
							<input type="hidden" name="inventoryID" value="<?= $inventoryID ?>">
							<input type="hidden" name="itemID" value="<?= $ID ?>">
							<input type="hidden" name="itemType" value="<?= $itemType ?>">
							<?php
							if($Item['Inventory_Equipment_Equipped'] == '0')
							{
								?>
								<input type="submit" class="btn btn-success" value="<?= $inventory25 ?>">
								<?php
							}
							else
							{
								?>
								<input type="submit" class="btn btn-info" value="<?= $inventory25 ?>">
								<?php
							} ?>
						</form>
						<?php
					}
					if($itemType == 'Parchment')
					{
						?>
						<form method="POST" action="Use.php">
							<input type="hidden" name="inventoryID" value="<?= $inventoryID ?>">
							<input type="hidden" name="itemID" value="<?= $ID ?>">
							<input type="hidden" name="itemType" value="<?= $itemType ?>">
							<input type="submit" class="btn btn-info" value="<?= $inventory35 ?>">
						</form>
						<?php
					}
					?>
					<form method="POST" action="Sale.php">
						<input type="hidden" name="inventoryID" value="<?= $inventoryID ?>">
						<input type="hidden" name="itemID" value="<?= $ID ?>">
						<input type="hidden" name="itemGold" value="<?= $salePrice ?>">
						<input type="hidden" name="itemType" value="<?= $itemType ?>">
						<input type="submit" class="btn btn-default" name="Sale" value="<?= $inventory26 ?>"><br /><br />
					</form>
				</td>
			</tr>
		</table>
		<?php
	}
	$Item_Query->closeCursor();
	?>
	<form method="POST" action="index.php"><br />
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $inventory24 ?>">
	</form>
	<?php
}

function showAllInvocations($bdd, $characterID)
{
	global $inventory11, $inventory12, $inventory19, $inventory20, $inventory21, $inventory22, $inventory24, $inventory25, $inventory26, $inventory35; ?>

	<?php
	$Item_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Invocations, Caranille_Invocations
	WHERE Inventory_Invocation_ID = Invocation_ID
	AND Inventory_Invocation_Character_ID = ?
	ORDER BY Invocation_Name");
	$Item_Query->execute([$characterID]);
	
	while ($Item = $Item_Query->fetch())
	{
		$ID = stripslashes($Item['Invocation_ID']);
		$name = stripslashes($Item['Invocation_Name']);
		$description = stripslashes($Item['Invocation_Description']);
		?>
		<table class="table">
		
			<tr>
				<td>
					<?= $inventory11 ?>
				</td>
			
				<td>
					<?= $name ?>
				</td>
			</td>
			
			<tr>
				<td>
					<?= $inventory12 ?>
				</td>
			
				<td>
		
				<td>
					<?= $description ?>
				</td>
			</tr>
			
		</table>
		<?php
	}
	$Item_Query->closeCursor();
	?>
	</table>
	<form method="POST" action="index.php"><br />
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $inventory24 ?>">
	</form>
	<?php
}

function showAllItems($bdd, $characterID)
{
	global $inventory11, $inventory12, $inventory14, $inventory15, $inventory15, $inventory16, $inventory17, $inventory19, $inventory20, $inventory21, $inventory22, $inventory24, $inventory25, $inventory26, $inventory35; ?>

	<?php
	$Item_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items, Caranille_Items
	WHERE Inventory_Item_Item_ID = Item_ID
	AND Item_Type = 'Health' OR 'Magic'
	AND Inventory_Item_Character_ID = ?
	ORDER BY Item_Name");
	$Item_Query->execute([$characterID]);
	
	while ($Item = $Item_Query->fetch())
	{
		$ID = stripslashes($Item['Item_ID']);
		$name = stripslashes($Item['Item_Name']);
		$description = stripslashes($Item['Item_Description']);
		$levelRequired = stripslashes($Item['Item_Level_Required']);
		$itemQuantity = '1';
		$inventoryID = stripslashes($Item['Inventory_Item_ID']);
		$salePrice = stripslashes($Item['Item_Sale_Price']);
		?>
		<table class="table">
		
			<tr>
				<td>
					<?= $inventory11 ?>
				</td>
			
				<td>
					<?= $name ?>
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $inventory12 ?>
				</td>
			
				<td>
					<?= $description ?>
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $inventory14 ?>
				</td>
			
				<td>
					<?= $itemQuantity ?>
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $inventory15 ?>
				</td>
			
				<td>
					<?= '+' .$HPEffect. ' HP' ?><br />
					<?= '+' .$MPEffect. ' MP' ?><br />
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $inventory16 ?>
				</td>
			
				<td>
					<?= $salePrice ?>
				</td>
			</tr>
		
			<tr>
				<td>
					<?= $inventory17 ?>
				</td>
			
				<td>
					<form method="POST" action="Sale.php">
						<input type="hidden" name="inventoryID" value="<?= $inventoryID ?>">
						<input type="hidden" name="itemID" value="<?= $ID ?>">
						<input type="hidden" name="itemGold" value="<?= $salePrice ?>">
						<input type="hidden" name="itemType" value="<?= $itemType ?>">
						<input type="submit" class="btn btn-default" name="Sale" value="<?= $inventory26 ?>"><br /><br />
					</form>
				</td>
			</tr>
		</table>
		<?php
	}
	$Item_Query->closeCursor();
	?>
	</table>
	<form method="POST" action="index.php"><br />
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $inventory24 ?>">
	</form>
	<?php
}

function showAllMagics($bdd, $characterID)
{
	global $inventory11, $inventory12, $inventory19, $inventory20, $inventory21, $inventory22, $inventory24, $inventory25, $inventory26, $inventory35; ?>

	<?php
	$Item_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Magics, Caranille_Magics
	WHERE Inventory_Magic_Magic_ID = Magic_ID
	AND Inventory_Magic_Character_ID = ?
	ORDER BY Magic_Name");
	$Item_Query->execute([$characterID]);
	
	while ($Item = $Item_Query->fetch())
	{
		$ID = stripslashes($Item['Magic_ID']);
		$name = stripslashes($Item['Magic_Name']);
		$description = stripslashes($Item['Magic_Description']);
		?>
		<table class="table">
		
			<tr>
				<td>
					<?= $inventory11 ?>
				</td>
			
				<td>
					<?= $name ?>
				</td>
			</td>
		
			<tr>
				<td>
					<?= $inventory12 ?>
				</td>
			
				<td>
					<?= $description ?>
				</td>
			</tr>
		</table>
		<?php
	}
	$Item_Query->closeCursor();
	?>
	<form method="POST" action="index.php"><br />
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $inventory24 ?>">
	</form>
	<?php
}

function showAllParchments($bdd, $characterID)
{
	global $inventory11, $inventory12, $inventory14, $inventory15, $inventory15, $inventory16, $inventory17, $inventory19, $inventory20, $inventory21, $inventory22, $inventory24, $inventory25, $inventory26, $inventory35; ?>
	<table class="table">
		<tr>
			<td>
				<?= $inventory11 ?>
			</td>
			
			<td>
				<?= $inventory12 ?>
			</td>
			
			<td>
				<?= $inventory14 ?>
			</td>
		
			<td>
				<?= $inventory15 ?>
			</td>
		
			<td>
				<?= $inventory16 ?>
			</td>
		
			<td>
				<?= $inventory17 ?>
			</td>
		</tr>
	<?php

	$Item_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items, Caranille_Items
	WHERE Inventory_Item_Item_ID = Item_ID
	AND Item_Type = 'Parchment'
	AND Inventory_Item_Character_ID = ?
	ORDER BY Item_Name");
	$Item_Query->execute([$characterID]);
	
	while ($Item = $Item_Query->fetch())
	{
		$ID = stripslashes($Item['Item_ID']);
		$name = stripslashes($Item['Item_Name']);
		$description = stripslashes($Item['Item_Description']);
		$levelRequired = stripslashes($Item['Item_Level_Required']);
		$itemQuantity = '1';
		$HPEffect = stripslashes($Item['Item_HP_Effect']);
		$MPEffect = stripslashes($Item['Item_MP_Effect']);
		$StrengthEffect = stripslashes($Item['Item_Strength_Effect']);
		$inventoryID = stripslashes($Item['Inventory_Item_ID']);
		$magicEffect = stripslashes($Item['Item_Magic_Effect']);
		$agilityEffect = stripslashes($Item['Item_Agility_Effect']);
		$defenseEffect = stripslashes($Item['Item_Defense_Effect']);
		$salePrice = stripslashes($Item['Item_Sale_Price']);
		?>
		<tr>
			<td>
				<?= $name ?>
			</td>
		
			<td>
				<?= $description ?>
			</td>
		
			<td>
				<?= $itemQuantity ?>
			</td>
		
			<td>
				<?= '+' .$HPEffect. ' HP' ?><br />
				<?= '+' .$MPEffect. ' MP' ?><br />
			</td>
		
			<td>
				<?= $salePrice ?>
			</td>
		
			<td>
				<form method="POST" action="Sale.php">
					<input type="hidden" name="inventoryID" value="<?= $inventoryID ?>">
					<input type="hidden" name="itemID" value="<?= $ID ?>">
					<input type="hidden" name="itemGold" value="<?= $salePrice ?>">
					<input type="hidden" name="itemType" value="<?= $itemType ?>">
					<input type="submit" class="btn btn-default" name="Sale" value="<?= $inventory26 ?>"><br /><br />
				</form>
			</td>
		</tr>
		<?php
	}
	$Item_Query->closeCursor();
	?>
	</table>
	<form method="POST" action="index.php"><br />
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $inventory24 ?>">
	</form>
	<?php
}

//INSERT
function updateGold($bdd, $characterID, $gold)
{
	$updateAccount =  $bdd->prepare("UPDATE Caranille_Characters SET Character_Gold = Character_Gold + :Item_Sale_Price
	WHERE Character_ID = :characterID");
	$updateAccount ->execute(array('Item_Sale_Price'=> $gold, 'characterID'=> $characterID));
}

