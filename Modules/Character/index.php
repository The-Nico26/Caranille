<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);

?>
<br>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title"> <?= $characterLastName." ".$characterFirstName." (".$characterLevel.")" ?> </h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-5">
						<img class="media-object img-responsive img-circle"  src="<?= $characterPicture ?>" alt="" width="64" height="64">
					</div>
					<div class="col-lg-7">
						<div class="important"><?= $character0 ?> : <?= $characterLastName ?></div>
						<div class="important"><?= $character1 ?> : <?= $characterFirstName ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="important"><?= $character2 ?> : <?= $characterLevel ?></div>
				<div class="important"><?= $character3 ?> : <?= $characterStrength ?></div>
				<div class="important"><?= $character4 ?> : <?= $characterMagic ?></div>
				<div class="important"><?= $character5 ?> : <?= $characterAgility ?></div>
				<div class="important"><?= $character6 ?> : <?= $characterDefense ?></div>
				<div class="important"><?= $character7 ?> : <?= $characterWisdom ?></div>
				<div class="important"><?= $character8 ?> : <?= "$characterHP / $characterHPMax" ?></div>
				<div class="important"><?= $character9 ?> : <?= "$characterMP / $characterMPMax" ?></div>
			</div>
			<div class="col-lg-4">
				<div class="important"><?= $character10 ?> : <?= $characterGold ?></div>
				<div class="important"><?= $character11 ?> : <?= $characterExperience ?></div>
				<div class="important"><?= $character12 ?> : <?= $characterSkillPoint ?></div>
				<div class="important"><?= $character13 ?> : <?= $nextLevel ?></div>
				<div class="important"><?= $character14 ?> : <?= newTown($bdd, $townID)->getName() ?></div>
			</div>
		</div>
	</div>
</div>

<?php require_once $_SESSION['File_Root'].'/HTML/Footer.php' ?>