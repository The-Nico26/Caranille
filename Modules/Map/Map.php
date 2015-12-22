<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);

if (isset($_POST['townID'])) 
{
    $townID = htmlspecialchars(addslashes($_POST['townID']));
    $access = verifyTown($bdd, $characterChapter);

    if ($access > 0) 
    {
        updateCharacterTownId($bdd, $townID, $characterID);
        exit(header("Location: $linkRoot/Modules/Town/index.php")); 
    } 
    else 
    {
    	exit(header("Location: $linkRoot/Modules/Main/index.php")); 
    }
}

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
?>
