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
$message = htmlspecialchars(addslashes($_POST['message']));
$toID = htmlspecialchars(addslashes($_POST['characterID']));

sendMessage($bdd, $subject, $message, $toID, $characterID, '0'); ?>

<?= $messageprivate8 ?>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
