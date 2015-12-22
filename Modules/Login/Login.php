<?php
$timeStart = microtime(true);
session_start();
ob_start();
require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';
require_once 'Functions/SQL.php';

$accountPseudo = htmlspecialchars(addslashes($_POST['accountPseudo']));
$accountPassword = htmlspecialchars(addslashes($_POST['accountPassword']));

$account = findAccount($bdd, $accountPseudo); ?>

	<br>
	<div class="panel panel-danger">
		<div class="panel-heading"></div>
		<div class="panel-body">
		
<?php
if (DeCryptMDP($accountPassword, $account['Account_Password'])) 
{
    $ID = findIdByPseudo($bdd, $accountPseudo);
    $account = newAccount($bdd, $ID);
    if ($account->getStatus() == 0)
    {
    	$gameStatus = verifyConnectionGame($bdd);
    	if ($gameStatus == 0)
    	{
		    $_SESSION['Account_ID'] = $ID;
			echo "lol";
			exit(header("Location: $linkRoot/Modules/Main/index.php")); 
    	}
    	else
    	{
    		if ($account->getAccess() == 2)
    		{
    			$_SESSION['Account_ID'] = $ID;
				exit(header("Location: $linkRoot/Modules/Main/index.php")); 
    		}
    		else
    		{
    			echo $login7;
    		}
    	}
    }
    else
    {
    	echo "$login6" .$account->getReason(). "";
    }
} 
else 
{
    echo $login5;
}

?>
	</div>
		</div>
		
<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>
