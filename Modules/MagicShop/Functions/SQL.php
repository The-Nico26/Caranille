<?php
//INSERT
function addMagic($bdd, $magicID, $characterID)
{
	global $magicShop9;
	global $magicShop10;
	
	$addMagic = $bdd->prepare("INSERT INTO Caranille_Inventory_Magics VALUES('', :characterID, :magicID)");
	$addMagic->execute(array('characterID'=> $characterID, 'magicID'=> $magicID)); ?>

	<?= $magicShop9 ?><br><br>
	<form method="POST" action="index.php">
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $magicShop10 ?>">
	</form>
	<?php
	$addMagic->closeCursor();
}

//SELECT
function verifyMagic($bdd, $magicID, $characterID)
{
	$Magic_Quantitys_Query = $bdd->prepare("SELECT * FROM Caranille_Inventory_Magics
	WHERE Inventory_Magic_Magic_ID= ?
	AND Inventory_Magic_Character_ID= ?");
	$Magic_Quantitys_Query->execute([$magicID, $characterID]);
	$Magic_Quantity = $Magic_Quantitys_Query->rowCount();
	return $Magic_Quantity;
}

function canBePurchased($bdd, $magicID, $characterTownID)
{
	$Magic_List_Query = $bdd->prepare("SELECT * FROM Caranille_Magics, Caranille_Towns_Magics
	WHERE Town_Magic_Magic_ID = Magic_ID
	AND Town_Magic_Town_ID = ?
	AND Magic_ID = ?");
	$Magic_List_Query->execute([$characterTownID, $magicID]);
	$Magic_Query = $Magic_List_Query->rowCount();
	return $Magic_Query;
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

function showAllMagics($bdd, $townID)
{
	global $magicShop0, $magicShop1, $magicShop2, $magicShop3, $magicShop4, $magicShop5, $magicShop6;
	
	echo $magicShop0;
	
	$Magic_Query = $bdd->prepare("SELECT * FROM Caranille_Magics, Caranille_Towns_Magics
	WHERE Town_Magic_Magic_ID = Magic_ID
	AND Town_Magic_Town_ID = ?");
	$Magic_Query->execute([$townID]);
	
	while ($Magic = $Magic_Query->fetch())
	{
		$magicID = stripslashes($Magic['Magic_ID']);
		$magicPicture = stripslashes($Magic['Magic_Picture']);
		$magicType = stripslashes($Magic['Magic_Type']); ?>
		
		<table class="table">
			<tr>
				<td>
					<?= $magicShop1 ?>
				</td>
			
				<td>
					<img src="<?= $magicPicture ?>"><br />
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $magicShop2 ?>
				</td>
			
				<td>
					<?= stripslashes($Magic['Magic_Name']) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $magicShop3 ?>
				</td>
			
				<td>
					<?= stripslashes(nl2br($Magic['Magic_Description'])) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $magicShop4 ?>
				</td>
			
				<td>
					<?= stripslashes($Magic['Magic_Price']) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $magicShop5 ?>
				</td>
			
				<td>
					<form method="POST" action="BuyMagic.php">
					<input type="hidden" name="magicID" value="<?= $magicID ?>">
					<input type="submit" class="btn btn-success" name="Buy" value="<?= $magicShop6 ?>">
					</form>
				</td>
			</tr>
		</table>
		<?php
	}
	$Magic_Query->closeCursor();
	?>
	</table>
	<?php
}

//UPDATE
function updateCharacterGold($bdd, $gold, $characterID)
{
	$Update_Account = $bdd->prepare("UPDATE Caranille_Characters SET Character_Gold= :gold WHERE Character_ID= :characterID");
	$Update_Account->execute(array('gold'=> $gold, 'characterID'=> $characterID));
}