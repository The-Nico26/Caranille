<?php 
//DELETE
function deleteMagic($bdd, $magicID)
{
	$deleteMagic = $bdd->prepare('DELETE FROM Caranille_Magics 
	WHERE Magic_ID = ?');
    $deleteMagic->execute([$magicID]);
    $deleteMagic->closeCursor();
}

//INSERT
function addMagic($bdd, $magicPicture, $magicName, $magicDescription, $magicType, $magicEffect, $magicMPCost, $magicPrice)
{
	$addMagic = $bdd->prepare("INSERT INTO Caranille_Magics VALUES(
	'',
	:magicPicture,
	:magicName, 
	:magicDescription,
	:magicType,
	:magicEffect,
	:magicMPCost,
	:magicPrice)");
	
	$addMagic->execute([
	'magicPicture' => $magicPicture,
	'magicName' => $magicName,
	'magicDescription' => $magicDescription,
	'magicType' => $magicType,
	'magicEffect' => $magicEffect,
	'magicMPCost' => $magicMPCost,
	'magicPrice' => $magicPrice]);
	
	$addMagic->closeCursor();
}

//SELECT
function showAllMagicsList($bdd, $id)
{
	?>
	<select name="magicID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Magics") as $magicList) 
	{
        $magicName = stripslashes($magicList['Magic_Name']);
        $magicID = stripslashes($magicList['Magic_ID']);
        
        if ($magicID == $id)
        {
        	?>
    		<option value="<?= $magicID ?>" selected><?= $magicName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $magicID ?>"><?= $magicName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

function showAllMagics($bdd)
{
	global $amagics3, $amagics4, $amagics5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Magics") as $magic) 
	{
        $magicID = stripslashes($magic['Magic_ID']); ?>
        <?= $amagics3 ?> : <b> <?= stripslashes($magic['Magic_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="magicID" value="<?= $magicID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amagics4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="magicID" value="<?= $magicID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amagics5 ?>">
    	</form>
        <hr>
        <?php
    }
}
//UPDATE
function updateMagic($bdd, $magicPicture, $magicName, $magicDescription, $magicType, $magicEffect, $magicMPCost, $magicPrice, $magicID)
{
	$updateMagic = $bdd->prepare('UPDATE Caranille_Magics
	SET Magic_Picture = :magicPicture,
	Magic_Name = :magicName,
	Magic_Description = :magicDescription,
	Magic_Type = :magicType,
	Magic_Effect = :magicEffect,
	Magic_MP_Cost = :magicMPCost,
	Magic_Price = :magicPrice
	WHERE Magic_ID = :magicID');
	
	$updateMagic->execute([
	'magicPicture' => $magicPicture,
	'magicName' => $magicName,
	'magicDescription' => $magicDescription,
	'magicType' => $magicType,
	'magicEffect' => $magicEffect,
	'magicMPCost' => $magicMPCost,
	'magicPrice' => $magicPrice,
	'magicID' => $magicID]);
	
	$updateMagic->closeCursor();
}
?>