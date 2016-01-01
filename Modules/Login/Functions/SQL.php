<?php
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
        $id = stripslashes($idList['Account_ID']);
    }
    $idListQuery->closeCursor();
    return $id;
}

function verifyConnectionGame($bdd)
{
	$verifyConnectionGame = $bdd->query('SELECT * FROM Caranille_Configuration');
    while ($verifyConnection = $verifyConnectionGame->fetch())
    {
        $Connection = stripslashes($verifyConnection['Configuration_Access']);
    }
    $verifyConnectionGame->closeCursor();
    return $Connection;
}