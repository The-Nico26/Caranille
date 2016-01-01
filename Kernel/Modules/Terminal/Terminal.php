<?php

$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);

$shellCommand = explode(" ", $_POST['shellCommand']);

switch ($shellCommand[0])
{
	case "caranille" :
		echo "Ce jeu est bien caranille, vous êtes fort";
	break;
	
	case "addGold" :
		if ($accountAccess == 2) { terminalAddGolds($bdd, $characterID, $shellCommand[1]); echo "You have add ".$shellCommand[1]." PO to your account"; } else { echo "You must be an administrator to execute this commande"; };
	break;
	
	case "addXP" :
		if ($accountAccess == 2) { terminalAddXP($bdd, $characterID, $shellCommand[1]); echo "You have add ".$shellCommand[1]." XP to your account"; } else { echo "You must be an administrator to execute this commande"; };
	break;
	
	default:
		echo "Commande Undefined...";
	break;
}

echo "<form method=\"POST\" action=\"Terminal.php\">
<input type=\"text\" class=\"form-control\" placeholder=\"Terminal\" name=\"shellCommand\" required autofocus>
</form>";

require_once $_SESSION['File_Root'].'/HTML/Footer.php';

?>