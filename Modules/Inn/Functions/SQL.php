<?php
//UPDATE
function useINN($bdd, $townPriceInn, $characterID)
{
    $updateAccount = $bdd->prepare('UPDATE Caranille_Characters
    SET Character_Gold = Character_Gold - :Town_Price_INN,
    Character_HP_CURRENT = Character_HP_TOTAL,
    Character_MP_CURRENT = Character_MP_TOTAL
    WHERE Character_ID = :Character_ID');
    $updateAccount->execute([
    'Town_Price_INN' => $townPriceInn,
    'Character_ID' => $characterID]);
    $updateAccount->closeCursor();
}