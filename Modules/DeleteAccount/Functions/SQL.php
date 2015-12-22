<?php
//DELETE
function deleteAccount($bdd, $accountID)
{
	$deleteAccount = $bdd->prepare("DELETE FROM Caranille_Accounts WHERE Account_ID = :accountID");
	$deleteAccount->execute(array('accountID' => $accountID));
	
	$deleteCharacter = $bdd->prepare("DELETE FROM Caranille_Characters WHERE Character_Account_ID = :accountID");
	$deleteCharacter->execute(array('accountID' => $accountID));
}

//SELECT
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