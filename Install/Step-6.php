<?php
    session_start();
    require_once '../Kernel/Config/Server.php';
    require_once '../Kernel/Config/SQL.php';
    require_once '../Kernel/Functions/BDD.php';

    $language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";

    $bdd->query(file_get_contents('BDD.sql'));

    $level = 1;
    $experience = 0;
    $hp = 100;
    $mp = 10;
    $strength = 10;
    $magic = 10;
    $agility = 10;
    $defense = 10;

    $bdd->exec("
    INSERT INTO Caranille_Levels VALUES(
    '',
    '$level',
    '$experience',
    '$hp',
    '$mp',
    '$strength',
    '$magic',
    '$agility',
    '$defense')");

    $hpChoice = $_POST['HPLevel'];
    $mpChoice = $_POST['MPLevel'];
    $mpChoice = $_POST['strengthLevel'];
    $magicChoice = $_POST['magicLevel'];
    $agilityChoice = $_POST['agilityLevel'];
    $defenseChoice = $_POST['defenseLevel'];
    $experienceChoice = $_POST['experienceLevel'];
    $numberLevelChoice = $_POST['numberLevel'];
    $skillPoints = $_POST['skillPoints'];

	while ($level < $numberLevelChoice) 
	{
	    $hp += $hpChoice;
	    $mp += $mpChoice;
	    $strength += $mpChoice;
	    $magic += $magicChoice;
	    $agility += $agilityChoice;
	    $defense += $defenseChoice;
	    $experience += $experienceChoice;
	
	    ++$level;
	    $bdd->exec("
	    INSERT INTO Caranille_Levels VALUES(
	    '',
	    '$level',
	    '$experience',
	    '$hp',
	    '$mp',
	    '$strength',
	    '$magic',
	    '$agility',
	    '$defense')");
	}
	
	$mmorpg = $bdd->prepare("INSERT INTO Caranille_Configuration VALUES(
	'',
	'',
	'',
	'No',
	:skillPoints)");
	
	$mmorpg->execute([
	'skillPoints' => $skillPoints]);
	
	?>
	<?= $install27 ?>
	<form method="POST" action="Step-7.php">
	    <input type="submit" class="btn btn-success" name="Configure" value="<?= $install28 ?>">
	</form>
<?php include_once "footer.php"; ?>