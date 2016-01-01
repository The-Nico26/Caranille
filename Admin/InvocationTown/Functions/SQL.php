<?php
//DELETE
function deleteInvocationTown($bdd, $townInvocationID)
{
	$deleteInvocationTown = $bdd->prepare('DELETE FROM Caranille_Towns_Invocations
	WHERE Town_Invocation_ID = ?');
    $deleteInvocationTown->execute([$townInvocationID]);
    $deleteInvocationTown->closeCursor();
}

//INSERT
function addInvocationTown($bdd, $townID, $invocationID)
{
	$addInvocationTown = $bdd->prepare("INSERT INTO Caranille_Towns_Invocations VALUES(
    '',
    :invocationID,
    :townID
    )");

    $addInvocationTown->execute([
    'invocationID' => $invocationID,
    'townID' => $townID]);

    $addInvocationTown->closeCursor();
}

//SELECT
function showAllInvocationsList($bdd, $id)
{
	?>
	<select name="invocationID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Invocations") as $invocationList) 
	{
        $invocationName = stripslashes($invocationList['Invocation_Name']);
        $invocationID = stripslashes($invocationList['Invocation_ID']);
        
        if ($invocationID == $id)
        {
        	?>
    		<option value="<?= $invocationID ?>" selected><?= $invocationName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $invocationID ?>"><?= $invocationName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

function showInvocationsTown($bdd, $townID)
{
	global $atown19, $atown23;
	
	$showInvocationTown = $bdd->prepare('SELECT * FROM Caranille_Towns_Invocations 
	WHERE Town_Invocation_Town_ID = ? 
	ORDER BY Town_Invocation_ID desc');
	
    $showInvocationTown->execute([$townID]);
    ?>
	<br><table class="table">
		<tr>
			<th>Invocation</th>
            <th></th>
        </tr>
    <?php
    while ($invocation = $showInvocationTown->fetch()) 
    {
		$invocationID = stripslashes($invocation['Town_Invocation_Invocation_ID']);
		$townInvocationID = stripslashes($invocation['Town_Invocation_ID']);
		?>
        <tr>
            <td>
            	<?php newInvocation($bdd, $invocationID)->getName() ?>
            </td>
        	<td>
        		<form method="POST" action="Delete.php">
            		<input type="hidden" name="townID" value="<?= $townID ?>">
            		<input type="hidden" name="townInvocationID" value="<?= $townInvocationID ?>">
            		<input class="btn btn-warning" type="submit" value="<?= $atown23 ?>">
            	</form>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    $showInvocationTown->closeCursor();
}