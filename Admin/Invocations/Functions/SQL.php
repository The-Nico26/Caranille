<?php
//DELETE
function deleteItem($bdd, $invocationID)
{
	$deleteItem = $bdd->prepare('DELETE FROM Caranille_Invocations
	WHERE Invocation_ID = ?');
    $deleteItem->execute([$invocationID]);
    $deleteItem->closeCursor();
}

//SELECT
function showAllInvocations($bdd)
{
	global $ainvocation3, $ainvocation4, $ainvocation5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Invocations") as $invocationList)
	{
		$invocationID = stripslashes($invocationList['Invocation_ID']); ?>
       	<?= $ainvocation3 ?> : <?= stripslashes($invocationList['Invocation_Name']) ?><br>
		<form method="POST" action="Edit.php">
			<input type="hidden" name="invocationID" value="<?= $invocationID ?>">
			<input class="btn btn-info" type="submit" value="<?= $ainvocation4 ?>">
		</form>
		<form method="POST" action="Delete.php">
			<input type="hidden" name="invocationID" value="<?= $invocationID ?>">
			<input class="btn btn-info" type="submit" value="<?= $ainvocation5 ?>">
		</form><hr>
		<?php
	}
}

//INSERT
function addInvocation($bdd, $invocationImage, $invocationName, $invocationDescription, $invocationDamage, $invocationPrice)
{
    $addInvocation = $bdd->prepare("INSERT INTO Caranille_Invocations VALUES(
    '',
    :invocationImage,
    :invocationName,
    :invocationDescription,
    :invocationDamage,
    :invocationPrice)");

    $addInvocation->execute([
    'invocationImage' => $invocationImage,
    'invocationName' => $invocationName,
    'invocationDescription' => $invocationDescription,
    'invocationDamage' => $invocationDamage,
    'invocationPrice' => $invocationPrice]);

    $addInvocation->closeCursor();
}

function updateInvocation($bdd, $invocationID, $invocationImage, $invocationName, $invocationDescription, $invocationDamage, $invocationPrice)
{
	$updateInvocation = $bdd->prepare('UPDATE Caranille_Invocations
	SET Invocation_Image = :invocationImage,
	Invocation_Name = :invocationName,
	Invocation_Description = :invocationDescription,
	Invocation_Damage = :invocationDamage,
	Invocation_Price = :invocationPrice
	WHERE Invocation_ID = :invocationID');
	
	$updateInvocation->execute([
	'invocationImage' => $invocationImage,
	'invocationName' => $invocationName,
	'invocationDescription' => $invocationDescription,
	'invocationDamage' => $invocationDamage,
	'invocationPrice' => $invocationPrice,
	'invocationID' => $invocationID]);
	
	$updateInvocation->closeCursor();
}
?>