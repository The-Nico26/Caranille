<?php
$timeStart = microtime(true);
session_start();
ob_start();
if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot); ?>

<?= $skillpoint0 ?>

<?= $skillpoint1 ?> <?= $characterSkillPoint ?> <?= $skillpoint2 ?><br /><br />

<form methode="POST" action="AddHP.php">
<input type="submit" value="<?= $skillpoint3 ?>">
</form>

<form methode="POST" action="AddMP.php">
<input type="submit" value="<?= $skillpoint4 ?>">
</form>

<form methode="POST" action="AddStrength.php">
<input type="submit" value="<?= $skillpoint5 ?>">
</form>

<form methode="POST" action="AddMagic.php">
<input type="submit" value="<?= $skillpoint6 ?>">
</form>

<form methode="POST" action="AddAgility.php">
<input type="submit" value="<?= $skillpoint7 ?>">
</form>

<form methode="POST" action="AddDefense.php">
<input type="submit" value="<?= $skillpoint8 ?>">
</form>

<form methode="POST" action="AddWisdom.php">
<input type="submit" value="<?= $skillpoint9 ?>">
</form>

<?php
require_once $_SESSION['File_Root'].'/HTML/Footer.php';
