<?php
function showPresentation($bdd)
{
    $recherchePresentation = $bdd->query("SELECT * FROM Caranille_Configuration")->fetch();
    echo stripslashes($recherchePresentation['Configuration_Presentation']);
}