<?php
//DELETE
function deleteTown($bdd, $townID)
{
	$deleteTown = $bdd->prepare('DELETE FROM Caranille_Towns 
	WHERE Town_ID = ?');
    $deleteTown->execute([$townID]);
    $deleteTown->closeCursor();
}

//INSERT
function addTown($bdd, $townPicture, $townName, $townDescription, $townPriceInn, $townChapter)
{
	$addTown = $bdd->prepare("INSERT INTO Caranille_Towns VALUES(
    '',
    :townPicture,
    :townName,
    :townDescription,
    :townPriceInn,
    :townChapter)");

    $addTown->execute([
    'townPicture' => $townPicture,
    'townName' => $townName,
    'townDescription' => $townDescription,
    'townPriceInn' => $townPriceInn,
    'townChapter' => $townChapter,]);

    $addTown->closeCursor();
}

//SELECT
function showAllTowns($bdd)
{
	global $atown3, $atown4, $atown5, $atown6, $atown21, $atown38, $atown39, $atown40, $atown41;
	
	foreach($bdd->query("SELECT * FROM Caranille_Towns") as $townList)
	{
        $townID = stripslashes($townList['Town_ID']); ?>
		<?= $atown3 ?>: <b> <?= stripslashes($townList['Town_Name']) ?>
		<div class="row" style="text-align:center;">
			<div class="col-lg-4">
				<form method="POST" action="Edit.php">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown4 ?>">
				</form>
				<form method="POST" action="Delete.php">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown5 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/MonsterTown/index.php"; ?>">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown6 ?>">
				</form>
			</div>
			
			<div class="col-lg-4">
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/EquipmentTown/index.php"; ?>">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown38 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/MagicTown/index.php"; ?>">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown39 ?>">
				</form>
			</div>
			<div class="col-lg-4">
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/InvocationTown/index.php"; ?>">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown41 ?>">
				</form>
				<form method="POST" action="<?php echo $_SESSION['Link_Root']."/Admin/ItemTown/index.php"; ?>">
					<input type="hidden" name="townID" value="<?= $townID ?>">
					<input type="submit" class="btn btn-default form-control" name="Send" name="Armor" value="<?= $atown40 ?>">
				</form>
			</div>
		</div><hr>
		<?php
	}
}

//UPDATE
function updateTown($bdd, $townID, $townPicture, $townName, $townDescription, $townPriceInn, $townChapter)
{
	$updateTown = $bdd->prepare('UPDATE Caranille_Towns
	SET Town_Picture = :townPicture,
	Town_Name = :townName,
	Town_Description = :townDescription,
	Town_Price_INN = :townPriceInn,
	Town_Chapter = :townChapter
	WHERE Town_ID = :townID');
	
	$updateTown->execute([
	'townPicture' => $townPicture,
	'townName' => $townName,
	'townDescription' => $townDescription,
	'townPriceInn' => $townPriceInn,
	'townChapter' => $townChapter,
	'townID' => $townID]);
	
	$updateTown->closeCursor();
}