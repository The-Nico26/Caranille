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

$magicID = htmlspecialchars(addslashes($_POST['magicID']));

$canBePurchased = canBePurchased($bdd, $magicID, $characterTownID);

if ($canBePurchased == 1)
{
	$number = verifyMagic($bdd, $magicID, $characterID);
	
	if ($number <= 0)
	{
		$magic = newMagic($bdd, $magicID);
		addMagic($bdd, $magicID, $characterID);
		
		$gold = $character->getGold() - $magic->getPrice();
		updateCharacterGold($bdd, $gold, $characterID);
	}
	else
	{
		?>
		<?= $magicShop8 ?>
		<?php
	}	
}
else
{
	?>
	An error has surved
	<?php
}


require_once $_SESSION['File_Root'].'/HTML/Footer.php';
