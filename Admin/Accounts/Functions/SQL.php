<?php
//SELECT
function showAllAccounts($bdd)
{
	global $aaccounts2, $aaccounts3, $aaccounts4;
	$Account_List_Query = $bdd->query("SELECT * FROM Caranille_Accounts");
	while ($Account_List = $Account_List_Query->fetch())
	{
		$accountID = stripslashes($Account_List['Account_ID']); ?>
		<?= $aaccounts2 ?> : <b> <?= stripslashes($Account_List['Account_Pseudo']) ?>
		<form method="POST" action="Edit.php">
			<input type="hidden" name="accountID" value="<?= $accountID ?>">
			<input class="btn btn-success" type="submit" name="secondEdit" value="<?= $aaccounts3 ?>">
			<input class="btn btn-danger" type="submit" name="Delete" value="<?= $aaccounts4 ?>">
		</form>
		<br>
		<?php
	}
	$Account_List_Query->closeCursor();
}

//UPDATE
function updateAccount($bdd, $accountPseudo, $accountEmail, $accountAccess, $accountID)
{
	$updateAccount = $bdd->prepare('UPDATE Caranille_Accounts 
	SET Account_Pseudo = :accountPseudo, 
	Account_Email = :accountEmail, 
	Account_Access = :accountAccess
	WHERE Account_ID = :accountID');
	
	$updateAccount->execute([
	'accountPseudo' => $accountPseudo,
    'accountEmail' => $accountEmail,
    'accountAccess' => $accountAccess,
    'accountID' => $accountID]);
    
    $updateAccount->closeCursor();
}