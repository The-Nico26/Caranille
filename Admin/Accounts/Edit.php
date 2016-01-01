<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$accountID = htmlspecialchars(addslashes($_POST['accountID']));

$playerAccount = newAccount($bdd, $accountID);
$Account_Pseudo = $playerAccount->getPseudo();
$Account_Email = $playerAccount->getEmail();
$Account_Access =  $playerAccount->getAccess();
?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $aaccounts2 ?><br> <input type="text" name="accountPseudo" class="form-control" placeholder="<?= $aaccounts2 ?>" value="<?= $Account_Pseudo ?>" required autofocus><br /><br />
			<?= $aaccounts5 ?><br> <input type="mail" name="accountEmail" class="form-control" placeholder="<?= $aaccounts5 ?>" value="<?= $Account_Email ?>" required><br /><br />
			<?= $aaccounts6 ?><br> <select name="accountAccess" class="form-control">
			
			<?php
			if ($Account_Access == 0)
			{
				?>
				<option selected="selected" value="0"><?= $aaccounts7 ?></option>
				<option value="1"><?= $aaccounts8 ?></option>
				<option value="2"><?= $aaccounts9 ?></option>
				<?php
			}
			else if ($Account_Access == 1)
			{
				?>
				<option selected="selected" value="1"><?= $aaccounts8 ?></option>
				<option value="0"><?= $aaccounts7 ?></option>
				<option value="2"><?= $aaccounts9 ?></option>
				<?php
			}
			else if ($Account_Access == 2)
			{
				?>
				<option selected="selected" value="2"><?= $aaccounts9 ?></option>
				<option value="0"><?= $aaccounts7 ?></option>
				<option value="1"><?= $aaccounts8 ?></option>";
				<?php
			}
			?>
			</select><br /><br />
			<input type="hidden" name="accountID" value="<?= $accountID ?>">
			<input class="btn btn-success" type="submit" value="<?= $aaccounts10 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>
