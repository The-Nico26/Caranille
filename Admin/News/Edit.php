<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

$newsID = htmlspecialchars(addslashes($_POST['newsID']));
$news = newNews($bdd, $newsID);

$newsTitle = $news->getTitle();
$newsMessage = $news->getMessage();
$newsAccountPseudo =  $news->getAccountPseudo();
$newsDate =  $news->getDate(); ?>

<br>
<div class="panel panel-warning">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<form method="POST" action="EndEdit.php">
			<?= $anews6 ?><br> <input class="form-control" type="text" name="newsTitle" value="<?= $newsTitle ?>" placeholder="<?= $anews6 ?>" required autofocus><br>
			<?= $anews7 ?> ?><br> <textarea class="form-control" name="newsMessage" placeholder="<?= $anews7 ?>" required><?= $newsMessage ?></textarea><br>
			<?= $anews8 ?><br> <input class="form-control" type="text"  name="newsAccountPseudo" value="<?= $newsAccountPseudo ?>"  readonly><br>				
			<?= $anews9 ?><br> <input class="form-control" type="datetime-local" name="newsDate" value="<?= $newsDate ?>" required><br /><br />
			<input type="hidden" name="newsID" value="<?= $newsID ?>">
			<input class="btn btn-success" type="submit" value="<?= $anews10 ?>">
		</form>
	</div>
</div>

<?php require_once $_SESSION['File_Root'] .'/HTML/Footer.php' ?>