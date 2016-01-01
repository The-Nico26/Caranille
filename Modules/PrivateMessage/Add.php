<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot); ?>

<form method="POST" action="Send.php">
<?= $messageprivate4 ?><br/><input type="text" name="subject" placeholder="Sujet"><br/><br/>
<?= $messageprivate5 ?><br/><textarea type="text" rows="5" name="message" placeholder="Message"></textarea><br/><br/>
<?php showListCharacterID($bdd, $characterID, $messageprivate6) ?>
<input type="submit" value="<?= $messageprivate7 ?>">
</form>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>