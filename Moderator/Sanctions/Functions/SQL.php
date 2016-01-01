<?php
//SELECT
function showPlayerSanction($bdd)
{
	?>
	<select name="playerID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Accounts 
	WHERE Account_Status = '0' 
	ORDER BY Account_Pseudo ASC") as $player)
	{
		$playerPseudo = stripslashes($player['Account_Pseudo']);
		$playerID = stripslashes($player['Account_ID']); ?>
		<option value="<?= $playerID ?>"><?= $playerPseudo ?></option>
		<?php
	}
	?>
	</select>
	<?php
}

function showPlayerSanctionList($bdd)
{
	global $msanction3, $msanction4, $msanction5;
	
	?>
	<br />
	<table class="table">
		<tr>
            <th>
                <?= $msanction3 ?>
            </th>
           	<th>
                <?= $msanction4 ?>
            </th>
        </tr>
    <?php
    foreach($bdd->query("SELECT * FROM Caranille_Accounts 
    WHERE Account_Status = '1' 
    ORDER BY Account_Pseudo ASC") as $player)
    {
		$accountID = stripslashes($player['Account_ID']); ?>
        <tr>
        	<th>
            	<?php newAccount($bdd, $accountID)->getPseudo() ?>
            </th>
            <th>
                <form method="POST" action="Delete.php">
			    	<input type="hidden" name="accountID" value="<?= $accountID ?>">
					<input class="btn btn-danger" type="submit" value="<?= $msanction5 ?>">
				</form>
         	</th>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
}
//ADD
function addReason($bdd, $playerID, $reason)
{
	$addReason = $bdd->prepare('UPDATE Caranille_Accounts
    SET Account_Reason = :reason,
    Account_Status = :status
    WHERE Account_ID = :playerID');

    $addReason->execute([
    'reason' => $reason,
    'status' => "1",
    'playerID' => $playerID]);

    $addReason->closeCursor();
}
//DELETE
function deleteReason($bdd, $playerID)
{
	$deleteReason = $bdd->prepare('UPDATE Caranille_Accounts
    SET Account_Reason = \'\',
	Account_Status = \'0\'
    WHERE Account_ID = ?');
    $deleteReason->execute([$playerID]);
    $deleteReason->closeCursor();
}