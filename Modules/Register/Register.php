<?php
$timeStart = microtime(true);
session_start();
ob_start();
require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

if (isset($_POST['accountPseudo']) && ($_POST['accountPassword']) && ($_POST['accountPasswordConfirm']) && ($_POST['accountEmail']) && ($_POST['characterLastName']) && ($_POST['characterFirstName'])) 
{
    $accountPseudo = htmlspecialchars(addslashes($_POST['accountPseudo']));
    $accountPassword = sha1(htmlspecialchars(addslashes($_POST['accountPassword'])));
    $accountPasswordConfirm = sha1(htmlspecialchars(addslashes($_POST['accountPasswordConfirm'])));
    $accountEmail = htmlspecialchars(addslashes($_POST['accountEmail']));
    $characterLastName = htmlspecialchars(addslashes($_POST['characterLastName']));
    $characterFirstName = htmlspecialchars(addslashes($_POST['characterFirstName']));

    if ($accountPassword == $accountPasswordConfirm) 
    {
        if (isset($_POST['Licence']))
        {
            $pseudoList = accountExist($bdd, $accountPseudo);

            if ($pseudoList == 0) 
            {
                $characterList = characterExist($bdd, $characterLastName);

                if ($characterList == 0)
                {
                    addAccount($bdd, $accountPseudo, $accountPassword, $accountEmail);
                    $ID = findIdByPseudo($bdd, $accountPseudo);
                    addCharacter($bdd, $ID, $characterLastName, $characterFirstName);
                    echo $register10;
                } 
                else 
                {
                    echo $register11;
                }
            } 
            else 
            {
                echo $register12;
            }
        } 
        else 
        {
            echo $register13;
        }
    } 
    else 
    {
        echo $register14;
    }
} 
else 
{
    echo $register15;
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
