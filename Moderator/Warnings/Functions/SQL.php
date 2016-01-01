<?php
//DELETE
function deleteWarning($bdd, $warningID)
{
	$deleteWarning = $bdd->prepare('DELETE FROM Caranille_Warnings
    WHERE Warning_ID = ?');
    $deleteWarning->execute([$warningID]);
    $deleteWarning->closeCursor();
}

//INSERT
function addWarning($bdd, $playerID, $accountID, $warningType, $warningMessage)
{
	$addWarning = $bdd->prepare("INSERT INTO Caranille_Warnings VALUES(
	'',
	:warningType,
	:warningMessage,
	:accountID,
	:playerID)");

    $addWarning->execute([
    'warningType' => $warningType,
    'warningMessage' => $warningMessage,
    'accountID' => $accountID,
    'playerID' => $playerID]);

    $addWarning->closeCursor();
}

//SELECT
function showPlayerWarning($bdd)
{
	?>
	<select name="playerID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Accounts 
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

function showPlayerWarningList($bdd)
{
	global $mwarning2, $mwarning4, $mwarning5;
	
	?>
	<br />
	<table class="table">
		<tr>
        	<th>
                <?= $mwarning2 ?>
            </th>
            <th>
                <?= $mwarning4 ?>
            </th>
        </tr>
    <?php
    foreach($bdd->query("SELECT * FROM Caranille_Warnings
    ORDER BY Warning_ID ASC") as $warning)
    {
		$accountID = stripslashes($warning['Warning_Receiver']);
		$warningID = stripslashes($warning['Warning_ID']); ?>
        <tr>
            <th>
            	<?php newAccount($bdd, $accountID)->getPseudo() ?>
            </th>
            <th>
                <form method="POST" action="Delete.php">
			    <input type="hidden" name="warningID" value="<?= $warningID ?>">
				<input class="btn btn-danger" type="submit" value="<?= $mwarning5 ?>">
				</form>
            </th>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
}