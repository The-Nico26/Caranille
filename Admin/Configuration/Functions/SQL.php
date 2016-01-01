<?php
//SELECT
function showConfiguration($bdd)
{
	global $aconfig0, $aconfig1, $aconfig2, $aconfig3, $aconfig4, $aconfig5;
	
	foreach($bdd->query("SELECT * FROM Caranille_Configuration") as $configuration) 
	{
		$configurationName = stripslashes($configuration['Configuration_MMORPG_Name']);
		$configurationPresentation = stripslashes($configuration['Configuration_Presentation']);
		$configurationAccess = stripslashes($configuration['Configuration_Access']);
		?>
		
        <form method="POST" action="Edit.php">
        <?= $aconfig0 ?><br><input class="form-control" type="text" name="confName" placeholder="$aconfig0" value="<?= $configurationName ?>" required autofocus><br>
   		<?= $aconfig1 ?><br><textarea class="form-control" name="configurationPresentation" rows="10" cols="50"  placeholder="<?= $aconfig1 ?>" required><?= $configurationPresentation ?></textarea><br>
		<?= $aconfig2 ?><br><select name="configurationAccess" class="form-control">
		
		<?php
        if ($confAccess == 0)
		{
			?>
			<option selected="selected" value="0"><?= $aconfig3 ?></option>
			<option value="1"><?= $aconfig4 ?></option>";
			<?php
		}
		else if ($confAccess == 1)
		{
			?>
			<option selected="selected" value="1"><?= $aconfig4 ?></option>
			<option value="0"><?= $aconfig3 ?></option>
			<?php
		}
		?>
		</select>
		<br>
				<input type="submit" class="btn btn-success" value="<?= $aconfig5 ?>">
			</form>
        <?php 
        return;
    }
}

//UPDATE
function updateConfiguration($bdd, $configurationName, $configurationPresentation, $configurationAccess)
{
	$updateConfiguration = $bdd->prepare('UPDATE Caranille_Configuration 
	SET Configuration_MMORPG_Name = :confName,
	Configuration_Presentation = :confPresentation,
	Configuration_Access = :confAccess
	WHERE Configuration_ID = 1');
		
	$updateConfiguration->execute([
	'confName' => $confName,
	'confPresentation' => $confPresentation,
	'confAccess' => $confAccess]);
	
	$updateConfiguration->closeCursor();
}