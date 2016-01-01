<?php
//INSERT

//add account on database
function addAccount($bdd, $accountPseudo, $accountPassword, $accountEmail)
{
	$date = date('Y-m-d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];

	$addAccount = $bdd->prepare("INSERT INTO Caranille_Accounts VALUES(
	'',
	:Pseudo,
	:Email,
	:Password,
	'0',
	:Date,
	:IP,
	'Authorized',
	'None')");

	$addAccount->execute([
	'Pseudo' => $accountPseudo,
	'Password' => $accountPassword,
	'Email' => $accountEmail,
	'Date' => $date,
	'IP' => $ip,]);
	$addAccount->closeCursor();
}

//add character on database
function addCharacter($bdd, $characterID, $characterLastName, $characterFirstName)
{
	$addCharacter = $bdd->prepare("INSERT INTO Caranille_Characters VALUES(
	'', 
	:Character_ID, 
	'http://localhost', 
	:Last_Name, 
	:First_Name, 
	'1', 
	'120', 
	'120', 
	'0', 
	'0', 
	'0', 
	'120', 
	'20', 
	'20', 
	'0', 
	'0', 
	'0', 
	'20', 
	'10', 
	'0', 
	'0', 
	'0', 
	'10', 
	'10', 
	'0', 
	'0', 
	'0', 
	'10', 
	'10', 
	'0', 
	'0', 
	'0', 
	'10', 
	'10', 
	'0', 
	'0', 
	'0', 
	'10', 
	'0', 
	'0', 
	'0', 
	'0', 
	'0', 
	'0', 
	'0', 
	'0', 
	'0', 
	'1')");

	$addCharacter->execute([
	'Character_ID' => $characterID,
	'Last_Name' => $characterLastName,
	'First_Name' => $characterFirstName,]);
	$addCharacter->closeCursor();
}

//SELECT

//we check if the account already exists before add it
function accountExist($bdd, $accountPseudo)
{
	$pseudoListQuery = $bdd->prepare('SELECT * FROM Caranille_Accounts 
	WHERE Account_Pseudo= ?');

	$pseudoListQuery->execute([$accountPseudo]);
	$pseudoList = $pseudoListQuery->rowCount();
	$pseudoListQuery->closeCursor();

	return $pseudoList;
}

//we check if the character already exists before add it
function characterExist($bdd, $characterLastName)
{
	$characterListQuery = $bdd->prepare('SELECT * FROM Caranille_Characters 
	WHERE Character_Last_Name= ?');

	$characterListQuery->execute([$characterLastName]);

	$characterList = $characterListQuery->rowCount();

	$characterListQuery->closeCursor();

	return $characterList;
}

//we seek the account ID to use for registration
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
