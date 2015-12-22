<?php
//UPDATE
function exitTown($bdd, $characterID)
{
    $updateAccount = $bdd->prepare('UPDATE Caranille_Characters 
    SET Character_Town_ID = 0 
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute([
    'Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}