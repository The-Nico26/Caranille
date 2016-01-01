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

$subject = htmlspecialchars(addslashes($_POST['subject']));
$parentID = htmlspecialchars(addslashes($_POST['parentID']));
$toID = htmlspecialchars(addslashes($_POST['characterID']));
$message = htmlspecialchars(addslashes($_POST['message']));

sendMessage($bdd, $subject, $message, $toID, $accountID, $parentID); ?>

<?= $messageprivate8 ?><br>

<?php exit(header("Location: $linkRoot/Modules/PrivateMessage/index.php")); ?>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
