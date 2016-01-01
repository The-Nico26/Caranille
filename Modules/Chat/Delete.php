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

$messageID = htmlspecialchars(addslashes($_POST['messageID']));

deleteMessage($bdd, $accountAccess, $messageID);

exit(header("Location: $linkRoot/Modules/Chat/index.php")); 

require_once $_SESSION['File_Root'].'/HTML/Footer.php';
