<?php
//DELETE
function deleteMission($bdd, $missionID)
{
	$deleteMission = $bdd->prepare('DELETE FROM Caranille_Missions
	WHERE Mission_ID = ?');
    $deleteMission->execute([$missionID]);
    $deleteMission->closeCursor();	
}

//INSERT
function addMission($bdd, $missionNumber, $townID, $missionName, $missionIntroduction, $missionVictory, $missionDefeate, $monsterID)
{
	$addMission = $bdd->prepare("INSERT INTO Caranille_Missions VALUES(
    '',
    :townID,
    :missionNumber,
    :missionName,
    :missionIntroduction,
    :missionVictory,
    :missionDefeate,
    :monsterID)");

    $addMission->execute([
   	'townID' => $townID,
    'missionNumber' => $missionNumber,
    'missionName' => $missionName,
    'missionIntroduction' => $missionIntroduction,
    'missionVictory' => $missionVictory,
    'missionDefeate' => $missionDefeate,
    'monsterID' => $monsterID]);

    $addMission->closeCursor();
}

//SELECT
function showAllMission($bdd)
{
	global $amission3, $amission4, $amission5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Missions") as $mission) 
	{
        $missionID = stripslashes($mission['Mission_ID']); ?>
        <?= $amission3 ?>: <b> <?= stripslashes($mission['Mission_Name']) ?></b><br>
        <form method="POST" action="Edit.php">
        	<input type="hidden" name="missionID" value="<?= $missionID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amission4 ?>">
    	</form>
    	<form method="POST" action="Delete.php">
    		<input type="hidden" name="missionID" value="<?= $missionID ?>">
    		<input class="btn btn-info" type="submit" value="<?= $amission5 ?>">
    	</form>
        <hr>
        <?php
    }
}

function showAllMonstersList($bdd, $id)
{
	?>
	<select name="monsterID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Monsters") as $monsterList) 
	{
        $monsterName = stripslashes($monsterList['Monster_Name']);
        $monsterID = stripslashes($monsterList['Monster_ID']);
        
        if($monsterID == $id)
        {
        	?>
    		<option value="<?= $monsterID ?>" selected><?= $monsterName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $monsterID ?>"><?= $monsterName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

function showAlltownsList($bdd, $id)
{
	?>
	<select name="townID" class="form-control">
	<?php
	foreach($bdd->query("SELECT * FROM Caranille_Towns") as $townList) 
	{
        $townName = stripslashes($townList['Town_Name']);
        $townID = stripslashes($townList['Town_ID']);
        
        if($townID == $id)
        {
        	?>
    		<option value="<?= $townID ?>" selected><?= $townName ?></option>
    		<?php
        }
        else
        {
        	?>
        	<option value="<?= $townID ?>"><?= $townName ?></option>
        	<?php
        }
    }
    ?>
    </select>
    <?php
}

//UPDATE
function updateMission($bdd, $missionNumber, $townID, $missionName, $missionIntroduction, $missionVictory, $missionDefeate, $monsterID, $missionID)
{
	$updateMission = $bdd->prepare('UPDATE Caranille_Missions 
	SET Mission_Town = :townID,
	Mission_Number = :missionNumber, 
	Mission_Name = :missionName, 
	Mission_Introduction = :missionIntroduction,
	Mission_Victory = :missionVictory,
	Mission_Defeate = :missionDefeate,
	Mission_Monster = :monsterID
	WHERE Mission_ID = :missionID');
	
	$updateMission->execute([
    'townID' => $townID,
    'missionNumber' => $missionNumber,
    'missionName' => $missionName,
    'missionIntroduction' => $missionIntroduction,
    'missionVictory' => $missionVictory,
    'missionDefeate' => $missionDefeate,
    'monsterID' => $monsterID,
    'missionID' => $missionID]);
    
    $updateMission->closeCursor();
}