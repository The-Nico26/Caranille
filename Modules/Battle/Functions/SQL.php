<?php	
//DELETE
function deleteItem($bdd, $characterID, $itemID)
{
	$deleteItem = $bdd->prepare("DELETE FROM Caranille_Inventory_Items
    WHERE Inventory_Item_Character_ID = :characterID
    AND Inventory_Item_Item_ID = :itemID
    LIMIT 1");
    $deleteItem->execute(['characterID'=> $characterID, 'itemID'=> $itemID]);
    $deleteItem->closeCursor();
}

function deleteMonsterBattle($bdd, $battleID)
{
    $deleteMonsterBattle = $bdd->prepare("DELETE FROM Caranille_Battles_Monsters 
    WHERE Battle_Monster_Battle_ID = ?");
    $deleteMonsterBattle->execute([$battleID]);
    
    $deleteBattleList = $bdd->prepare("DELETE FROM Caranille_Battles_List 
    WHERE Battle_List_ID = ?");
    $deleteBattleList->execute([$battleID]);
    
    $deleteMonsterBattle->closeCursor();
    $deleteBattleList->closeCursor();
}

//INSERT
function addDrop($bdd, $monsterID, $characterID)
{
	$selectDrop = $bdd->prepare("SELECT * FROM Caranille_Monsters_Drops WHERE Monster_Drop_Monster_ID = ?");
	$selectDrop->execute([$monsterID]);
	
	while($drop = $selectDrop->fetch())
	{
		$rando = rand(0,1000);
		if($rando <= $drop['Monster_Drop_Luck'])
		{
			if($drop['Monster_Drop_Type'] == "item")
			{
				$addItem = $bdd->prepare("INSERT INTO Caranille_Inventory_Items VALUES('', :characterID, :itemID)");
				$addItem->execute(array('characterID'=> $characterID, 'itemID'=> $drop['Monster_Drop_Item_ID']));
				$addItem->closeCursor();
			}
			if($drop['Monster_Drop_Type'] == "equipment")
			{
				$addEquipment = $bdd->prepare("INSERT INTO Caranille_Inventory_Equipments VALUES('', :characterID, :itemID, '0')");
				$addEquipment->execute(array('characterID'=> $characterID, 'itemID'=> $drop['Monster_Drop_Item_ID']));
				$addEquipment->closeCursor();
			}
			showDrop($bdd, $drop['Monster_Drop_Item_ID']);
		}
	}
	$selectDrop->closeCursor();
}

function addMissionSuccessfulID($bdd, $characterID, $missionID)
{
	$addMissionSuccessful = $bdd->prepare("INSERT INTO Caranille_Missions_Successful VALUES (:missionID, :characterID)");
	$addMissionSuccessful->execute(array('missionID' => $missionID, 'characterID' => $characterID));
	$addMissionSuccessful->closeCursor();
}

//SELECT
function findBattle($bdd, $characterID)
{
    $battleIDQuery = $bdd->prepare("SELECT * FROM Caranille_Battles_List 
    WHERE Battle_List_Character_ID = ?");
    $battleIDQuery->execute([$characterID]);
    while ($battleID = $battleIDQuery->fetch()) 
    {
        $Battle = $battleID;
    }
    $battleIDQuery->closeCursor();
    return $Battle;
}

function showChapterReward($bdd, $characterID, $battleChapterID)
{
	updateChapterID($bdd, $characterID);
	$recompenseChapter = $bdd->prepare("SELECT * FROM Caranille_Chapters 
	WHERE Chapter_ID = ?");
	$recompenseChapter->execute([$battleChapterID]);
	while($finish = $recompenseChapter->fetch())
	{
    	echo stripslashes(nl2br($finish[Chapter_Ending]));
	}
}

function showDrop($bdd, $itemID)
{
	global $battle34;
	$itemQuery = $bdd->prepare("SELECT * FROM Caranille_Items WHERE Item_ID = ?");
	$itemQuery->execute([$itemID]);
	while($item = $itemQuery->fetch())
	{
    	 $itemName = stripslashes($item['Item_Name']);
    	 echo "$battle34 $itemName <br />";
	}
}

function showInvocations($bdd, $characterID)
{
	global $battle13, $battle14, $battle15, $battle16, $battle19, $battle20, $battle21 ?>
	
	<form method="POST" action="EndInvocation.php">
	<?= $battle19 ?><br />
	<select name="invocationID">
	<?php
	$listQueryInvocation = $bdd->prepare("SELECT * FROM Caranille_Inventory_Invocations, Caranille_Invocations 
	WHERE Inventory_Invocation_Invocation_ID = Invocation_ID
	AND Inventory_Invocation_Character_ID = ?
	ORDER BY Invocation_Name ASC");
	$listQueryInvocation->execute(array($characterID));
	while ($listInvocation = $listQueryInvocation->fetch())
	{
		$invocationID = stripslashes($listInvocation[Invocation_ID]);
		$invocationName = stripslashes($listInvocation[Invocation_Name]);
		echo "<option value=$invocationID>$invocationName</option>";
	}
	$listQueryInvocation->closeCursor();
	?>
	</select>
	<br>
	<?= $battle20 ?><br />
	<input type="number" name="MPChoice" value="0"><br>
	<input type="hidden" name="invocationID" value="<?= $invocationID ?>">
	<input type="submit" class="btn btn-info" value="<?= $battle21 ?>">
	</form>
	<form method="POST" action="index.php">
	<input type="submit" class="btn btn-default" value="<?= $battle16 ?>"><br>
	</form>
	<?php
}

function showItems($bdd, $characterID)
{
	global $battle16, $battle24, $battle25, $battle26, $battle27, $battle28;
	
	$itemsQuantityQuery = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items, Caranille_Items
	WHERE Inventory_Item_Item_ID = Item_ID
	AND Inventory_Item_Character_ID = ?
	AND Item_Type = 'Health' 
    OR Item_Type = 'Magic'
	ORDER BY Item_Name ASC");
	$itemsQuantityQuery->execute(array($characterID));
	$itemQuantity = $itemsQuantityQuery->rowCount();
	
	if ($itemQuantity >=1)
	{
		?>
		<form method="POST" action="EndItem.php">
		<?= $battle24 ?><br /><br />
		<select name="itemID">
			<optgroup label="<?= $battle25 ?>">
			<?php
			$HPItemList = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items, Caranille_Items
			WHERE Inventory_Item_Item_ID = Item_ID
			AND Item_Type = 'Health'
			AND Inventory_Item_Character_ID = ?
			ORDER BY Item_Name ASC");
			$HPItemList->execute(array($characterID));
			while ($Item_List = $HPItemList->fetch())
			{
				$itemID = stripslashes($Item_List['Item_ID']);
				$Item = stripslashes($Item_List['Item_Name']);
				$itemHPEffect = stripslashes($Item_List['Item_HP_Effect']); 
				?>
				<option value="<?= $itemID ?>"><?= $Item ?>(+<?= $itemHPEffect ?> HP)</option>
				<?php
			}
			$itemsQuantityQuery->closeCursor(); ?>
			</optgroup>
			<optgroup label="<?= $battle26 ?>">
			<?php
			$MPItemList = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items, Caranille_Items
			WHERE Inventory_Item_Item_ID = Item_ID
			AND Item_Type = 'Magic'
			AND Inventory_Item_Character_ID = ?
			ORDER BY Item_Name ASC");
			$MPItemList->execute(array($characterID));
			while ($Item_List = $MPItemList->fetch())
			{
				$itemID = stripslashes($Item_List['Item_ID']);
				$Item = stripslashes($Item_List['Item_Name']);
				$itemMPEffect = stripslashes($Item_List['Item_MP_Effect']); 
				?>
				<option value="<?= $itemID ?>"><?= $Item ?>(+<?= $itemMPEffect ?> HP)</option>;
				<?php
			}
			$MPItemList->closeCursor(); ?>
			</optgroup>
		</select>
		<br /><br /><input type="submit" value="<?= $battle27 ?>">
		</form>
		<?php
	}
	else
	{
		echo "$battle28";
	}
	?>
	<form method="POST" action="index.php">
	<input type="hidden" name="itemID" value="<?= $itemID ?>">
	<input type="submit" name="Cancel" value="<?= $battle16 ?>"><br />
	</form>
	<?php
}

function showMagics($bdd, $characterID)
{
	global $battle13, $battle14, $battle15, $battle16
	
	?>
	<form method="POST" action="EndMagic.php">
	<?= $battle13 ?><br /><br />
	<select name="magic" ID="magic">
	<?php
	
	$List_Query_Magics = $bdd->prepare("SELECT * FROM Caranille_Inventory_Magics, Caranille_Magics 
	WHERE Inventory_Magic_Magic_ID = Magic_ID
	AND Inventory_Magic_Character_ID = ?
	ORDER BY Magic_Name ASC");
	$List_Query_Magics->execute(array($characterID));
	while ($List_Magics = $List_Query_Magics->fetch())
	{
		$magicID = stripslashes($List_Magics[Magic_ID]);
		$magicMPCost = stripslashes($List_Magics[Magic_MP_Cost]);
		$magicDescription = stripslashes($List_Magics[Magic_Description]);
		$magic = stripslashes($List_Magics[Magic_Name]);
		echo "<option value=$magic>$magic ($magicDescription, $magicMPCost MP)</option>";
		echo "<br />$battle14: $magicDescription<br /><br />";
	}
	$List_Query_Magics->closeCursor();
	?>
	
	 </select><br /><br />
	 <input type="hidden" name="magicID" value="<?= $magicID ?>">
	 <input type="submit" class="btn btn-info" name="endMagics" value="<?= $battle15 ?>">
	 </form>
	 <form method="POST" action="index.php">
	 <input type="submit" value="<?= $battle16 ?>"><br />
	 </form>
	 <?php
}

function showMissionReward($bdd, $characterID, $battleMissionID)
{
	addMissionSuccessfulID($bdd, $characterID, $battleMissionID);
	$recompenseMission = $bdd->prepare("SELECT * FROM Caranille_Missions 
	WHERE Mission_ID = ?");
	$recompenseMission->execute([$battleMissionID]);
	while($finish = $recompenseMission->fetch())
	{
    	 echo stripslashes($finish[Mission_Victory]);
	}
}

function verifyItem($bdd, $characterID, $itemID)
{
	$itemQuery = $bdd->prepare("SELECT * FROM Caranille_Inventory_Items 
	WHERE Inventory_Item_Character_ID = ?
	AND Inventory_Item_Item_ID = ?");
	$itemQuery->execute([$characterID, $itemID]);
	$itemQuantity = $itemQuery->rowCount();
	return $itemQuantity;
}

//UPDATE
function addExperience($bdd, $monsterExperience, $monsterGold, $characterID)
{
    $updateAccount = $bdd->prepare("UPDATE Caranille_Characters
    SET Character_Experience = Character_Experience + :monsterExperience,
    Character_Gold = Character_Gold + :monsterGold
    WHERE Character_ID = :characterId");
    $updateAccount->execute([
    'monsterExperience' => $monsterExperience,
    'monsterGold' => $monsterGold,
    'characterId' => $characterID]);
    $updateAccount->closeCursor();
}

function updateAccount($bdd, $characterHP, $characterMP, $characterID)
{
	$updateAccount = $bdd->prepare("UPDATE Caranille_Characters 
	SET Character_HP_Current = :Character_HP,
	Character_MP_Current = :Character_MP
	WHERE Character_ID = :Character_ID");
	$updateAccount->execute([
	'Character_HP' => $characterHP,
	'Character_MP' => $characterMP,
	'Character_ID' => $characterID]);
}

function updateBattleMonster($bdd, $monsterID, $monsterPicture, $monsterName, $monsterDescription, $monsterLevel, $monsterHp, $monsterMp, $monsterStrength, $monsterMagic, $monsterAgility, $monsterDefense, $monsterExperience, $monsterGold, $battleID) 
{
    $updateMonster = $bdd->prepare("UPDATE Caranille_Battles_Monsters
    SET Battle_Monster_Monster_ID = :Monster_ID,
    Battle_Monster_Monster_Picture = :Monster_Picture,
    Battle_Monster_Monster_Name = :Monster_Name,
    Battle_Monster_Monster_Description = :Monster_Description,
    Battle_Monster_Monster_Level = :Monster_Level,
    Battle_Monster_Monster_HP = :Monster_HP,
    Battle_Monster_Monster_MP = :Monster_MP,
    Battle_Monster_Monster_Strength = :Monster_Strength,
    Battle_Monster_Monster_Magic = :Monster_Magic,
    Battle_Monster_Monster_agility = :Monster_Agility,
    Battle_Monster_Monster_Defense = :Monster_Defense,
    Battle_Monster_Monster_Experience = :Monster_Experience,
    Battle_Monster_Monster_Gold = :Monster_Gold
    WHERE Battle_Monster_Battle_ID = :Battle_ID");

    $updateMonster->execute([
    'Monster_ID' => $monsterID,
    'Monster_Picture' => $monsterPicture,
    'Monster_Name' => $monsterName,
    'Monster_Description' => $monsterDescription,
    'Monster_Level' => $monsterLevel,
    'Monster_HP' => $monsterHp,
    'Monster_MP' => $monsterMp,
    'Monster_Strength' => $monsterStrength,
    'Monster_Magic' => $monsterMagic,
    'Monster_Agility' => $monsterAgility,
    'Monster_Defense' => $monsterDefense,
    'Monster_Experience' => $monsterExperience,
    'Monster_Gold' => $monsterGold,
    'Battle_ID' => $battleID]);
    $updateMonster->closeCursor();
}

function useINN($bdd, $townPriceInn, $characterID)
{
    $updateAccount = $bdd->prepare("UPDATE Caranille_Characters
    SET Character_Gold = Character_Gold - :Town_Price_INN,
    Character_HP_CURRENT = Character_HP_TOTAL,
    Character_MP_CURRENT = Character_MP_TOTAL
    WHERE Character_ID = :Character_ID");
    $updateAccount->execute([
    'Town_Price_INN' => $townPriceInn,
    'Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}