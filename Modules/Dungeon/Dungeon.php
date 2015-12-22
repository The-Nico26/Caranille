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

$monsterID = htmlspecialchars(addslashes($_POST['monsterID']));

$monster = previewBattle($bdd, $monsterID);

addBattle($bdd, $characterID, '0', '0', 'Battle');

$battleID = findBattle($bdd, $characterID)['Battle_List_ID'];

addMonsterBattle(
    $bdd,
    $battleID,
    $monster->getID(),
    $monster->getPicture(),
    $monster->getName(),
    $monster->getDescription(),
    $monster->getLevel(),
    $monster->getHp(),
    $monster->getMp(),
    $monster->getStrength(),
    $monster->getMagic(),
    $monster->getAgility(),
    $monster->getDefense(),
    $monster->getExperience(),
    $monster->getGold()
);

exit(header("Location: $linkRoot/Modules/Battle/index.php"));

require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
