<?php
//INSERT
function addEquipment($bdd, $equipmentID, $characterID)
{
	global $equipmentShop16, $equipmentShop17;
	
	$addMagic = $bdd->prepare("INSERT INTO Caranille_Inventory_Equipments VALUES('', :characterID, :equipmentID, '1', '0')");
	$addMagic->execute(array('characterID'=> $characterID, 'equipmentID'=> $equipmentID));

	echo "$equipmentShop16<br>";
	echo '<form method="POST" action="index.php">';
	echo "<input type=\"submit\" class=\"btn btn-success\" name=\"Cancel\" value=\"$equipmentShop17\">";
	echo '</form>';
	
	$addMagic->closeCursor();
}

//SELECT
function verifyEquipment($bdd, $equipmentID, $characterID)
{
	$equipmentQuantitysQuery = $bdd->prepare("SELECT * FROM Caranille_Inventory_Equipments
	WHERE Inventory_Equipment_Equipment_ID = ?
	AND Inventory_Equipment_Character_ID= ?");
	$equipmentQuantitysQuery->execute([$equipmentID, $characterID]);
	$equipmentQuantity = $equipmentQuantitysQuery->rowCount();
	return $equipmentQuantity;
}

function canBePurchased($bdd, $equipmentID, $characterTownID)
{
	$equipmentListQuery = $bdd->prepare("SELECT * FROM Caranille_Equipments, Caranille_Towns_Equipments
	WHERE Town_Equipment_Equipment_ID = Equipment_ID
	AND Town_Equipment_Town_ID = ?
	AND Equipment_ID = ?");
	$equipmentListQuery->execute([$characterTownID, $equipmentID]);
	$equipmentList = $equipmentListQuery->rowCount();
	
	return $equipmentList;
}

function findAccount($bdd, $pseudo)
{
    $searchAccount = $bdd->prepare("SELECT * FROM Caranille_Accounts 
    WHERE Account_Pseudo = ?");
    $searchAccount->execute([$pseudo]);
    $account = $searchAccount->fetch();
    $searchAccount->closeCursor();
    return $account;
}

function findIdByPseudo($bdd, $accountPseudo)
{
    $idListQuery = $bdd->prepare('SELECT Account_ID FROM Caranille_Accounts 
    WHERE Account_Pseudo = ?');
    $idListQuery->execute([$accountPseudo]);
    while ($idList = $idListQuery->fetch())
    {
        $id = $idList['Account_ID'];
    }
    $idListQuery->closeCursor();
    return $id;
}

function showAllEquipments($bdd, $townID)
{
	global $equipmentShop0, $equipmentShop1, $equipmentShop2, $equipmentShop3, $equipmentShop4, $equipmentShop5, $equipmentShop6,
			$equipmentShop7, $equipmentShop8, $equipmentShop9, $equipmentShop10, $equipmentShop11, $equipmentShop12, $equipmentShop13, $equipmentShop14;
	echo "$equipmentShop0<br />";
	
	
	$equipmentQuery = $bdd->prepare("SELECT * FROM Caranille_Equipments, Caranille_Towns_Equipments 
	WHERE Town_Equipment_Equipment_ID = Equipment_ID 
	AND Town_Equipment_Town_ID = ? 
	AND (Equipment_Type = 'Armor' OR Equipment_Type = 'Boots' OR Equipment_Type = 'Gloves' OR Equipment_Type = 'Helmet' OR Equipment_Type = 'Weapon')");
	$equipmentQuery->execute([$townID]);
	
	while ($weapon = $equipmentQuery->fetch())
	{
		$EquipmentID = stripslashes($weapon['Equipment_ID']);
		$EquipmentPicture = stripslashes($weapon['Equipment_Picture']);
		$EquipmentType = stripslashes($weapon['Equipment_Type']);
		echo '<table class="table">';

			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop1";
				echo '</td>';
			
				echo '<td>';
					echo "<img src=\"$EquipmentPicture\" alt=\"\"><br />";
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop2";
				echo '</td>';
			
				echo '<td>';
					echo stripslashes($weapon['Equipment_Level_Required']). '';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop3";
				echo '</td>';
			
				echo '<td>';
					echo '' .stripslashes($weapon['Equipment_Name']). '';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop4";
				echo '</td>';
			
				echo '<td>';
					echo '' .stripslashes(nl2br($weapon['Equipment_Description'])). '';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop5";
				echo '</td>';
			
				echo '<td>';
					echo '+' .stripslashes($weapon['Equipment_HP_Effect']). " $equipmentShop8<br>";
					echo '+' .stripslashes($weapon['Equipment_MP_Effect']). " $equipmentShop9<br>";
					echo '+' .stripslashes($weapon['Equipment_Strength_Effect']). " $equipmentShop10<br>";
					echo '+' .stripslashes($weapon['Equipment_Magic_Effect']). " $equipmentShop11<br>";
					echo '+' .stripslashes($weapon['Equipment_Agility_Effect']). " $equipmentShop12<br>";
					echo '+' .stripslashes($weapon['Equipment_Defense_Effect']). " $equipmentShop13";
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop6";
				echo '</td>';
			
				echo '<td>';
					echo '' .stripslashes($weapon['Equipment_Purchase_Price']). '';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>';
					echo "$equipmentShop7";
				echo '</td>';
			
				echo '<td>';
					echo '<form method="POST" action="BuyEquipment.php">';
					echo "<input type=\"hidden\" name=\"EquipmentID\" value=\"$EquipmentID\">";
					echo "<input type=\"submit\" class=\"btn btn-success\"name=\"Buy\" value=\"$equipmentShop14\">";
					echo '</form><br />';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	}
	$equipmentQuery->closeCursor();
	
}

//UPDATE
function updateEquipment($bdd, $characterID, $equipmentID)
{
	global $equipmentShop16, $equipmentShop17;
	
	$updateEquipment = $bdd->prepare("UPDATE Caranille_Inventory_Equipments SET Inventory_Equipment_Quantity = Inventory_Equipment_Quantity + 1
	WHERE Inventory_Equipment_Character_ID = :characterID
	AND Inventory_Equipment_Equipment_ID = :equipmentID");
	$updateEquipment->execute(array('characterID'=> $characterID, 'equipmentID'=> $equipmentID));

	echo "$equipmentShop16<br>";
	echo '<form method="POST" action="index.php">';
	echo "<input type=\"submit\" class=\"btn btn-success\" name=\"Cancel\" value=\"$equipmentShop17\">";
	echo '</form>';
	
	$updateEquipment->closeCursor();
}

function updateCharacterGold($bdd, $gold, $characterID)
{
	$Update_Account = $bdd->prepare("UPDATE Caranille_Characters SET Character_Gold= :gold WHERE Character_ID= :characterID");
	$Update_Account->execute(array('gold'=> $gold, 'characterID'=> $characterID));
}