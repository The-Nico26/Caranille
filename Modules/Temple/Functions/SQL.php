<?php
//INSERT
function addInvocation($bdd, $invocationID, $characterID)
{
	global $temple10;
	global $temple9;
	
	$addInvocation = $bdd->prepare("INSERT INTO Caranille_Inventory_Invocations VALUES('', :characterID, :invocationID)");
	$addInvocation->execute(array('characterID'=> $characterID, 'invocationID'=> $invocationID)); ?>

	<?= $temple10 ?><br><br>
	<form method="POST" action="index.php">
	<input type="submit" class="btn btn-success" name="Cancel" value="<?= $temple9 ?>">
	</form>
	<?php
	
	$addInvocation->closeCursor();
}

//SELECT
function verifyInvocation($bdd, $invocationID, $characterID)
{
	$invocationQuantitysQuery = $bdd->prepare("SELECT * FROM Caranille_Inventory_Invocations
	WHERE Inventory_Invocation_Invocation_ID= ?
	AND Inventory_Invocation_Character_ID= ?");
	$invocationQuantitysQuery->execute([$invocationID, $characterID]);
	$invocationQuantity = $invocationQuantitysQuery->rowCount();
	return $invocationQuantity;
}

function canBePurchased($bdd, $invocationID, $characterTownID)
{
	$invocationListQuery = $bdd->prepare("SELECT * FROM Caranille_Invocations, Caranille_Towns_Invocations
	WHERE Town_Invocation_Invocation_ID = Invocation_ID
	AND Town_Invocation_Town_ID = ?
	AND Invocation_ID = ?");
	$invocationListQuery->execute([$characterTownID, $invocationID]);
	$invocationQuery = $invocationListQuery->rowCount();
	
	return $invocationQuery;
}

function showAllInvocations($bdd, $townID)
{
	global $temple0, $temple1, $temple2, $temple3, $temple4, $temple5, $temple6;
	
	echo $temple0;

	$invocationQuery = $bdd->prepare("SELECT * FROM Caranille_Invocations, Caranille_Towns_Invocations
	WHERE Town_Invocation_Invocation_ID = Invocation_ID
	AND Town_Invocation_Town_ID = ?");
	$invocationQuery->execute([$townID]);
	
	while ($invocation = $invocationQuery->fetch())
	{
		$invocationID = stripslashes($invocation['Invocation_ID']);
		$invocationPicture = stripslashes($invocation['Invocation_Image']); ?>
		
		<table class="table">
			<tr>
				<td>
					<?= $temple1 ?>
				</td>
			
				<td>
					<img src="<?= $invocationPicture ?>" alt="">
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $temple2 ?>
				</td>
			
				<td>
					<?= stripslashes($invocation['Invocation_Name']) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $temple3 ?>
				</td>
			
				<td>
					<?= stripslashes(nl2br($invocation['Invocation_Description'])) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $temple4 ?>
				</td>
			
				<td>
					<?= stripslashes($invocation['Invocation_Price']) ?>
				</td>
				
				<tr>
					<td>
						<?= $temple5 ?>
					</td>
			
				<td>
					<form method="POST" action="BuyInvocation.php">
					<input type="hidden" name="invocationID" value="<?= $invocationID ?>">
					<input type="submit" class="btn btn-success" name="Buy" value="<?= $temple6 ?>">
					</form>
				</td>
			</tr>
		</table>
		<?php
	}
	?>
	</table>
	<?php
	$invocationQuery->closeCursor(); 
}
//UPDATE
function updateCharacterGold($bdd, $gold, $characterID)
{
	$Update_Account = $bdd->prepare("UPDATE Caranille_Characters SET Character_Gold= :gold WHERE Character_ID= :characterID");
	$Update_Account->execute(array('gold'=> $gold, 'characterID'=> $characterID));
}

?>