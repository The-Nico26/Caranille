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
?>
<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
	
	<?php
	$missionID = htmlspecialchars(addslashes($_POST['missionID']));
	$mission = newMission($bdd, $missionID);
	
	$monsterID = $mission->getMonster();

	$monster = previewBattle($bdd, $monsterID);
	
	addBattle($bdd, $characterID, '0', $missionID, 'Mission');
	
	$battle = findBattle($bdd, $characterID)['Battle_List_ID'];
	
	addMonsterBattle(
	    $bdd,
	    $battle,
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
	
	exit(header("Location: $linkRoot/Modules/Battle/index.php")); ?>
	
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>