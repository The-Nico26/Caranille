<?php
    session_start();

    $language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";
echo $install15; ?>
<form method="POST" action="Step-6.php">
    <?= $install16 ?><br><input type="number" class="form-control" name="HPLevel" autofocus required><br>
    <?= $install17 ?><br><input type="number" class="form-control" name="MPLevel" required><br>
    <?= $install18 ?><br><input type="number" class="form-control" name="strengthLevel" required><br>
    <?= $install19 ?><br><input type="number" class="form-control" name="magicLevel" required><br>
    <?= $install20 ?><br><input type="number" class="form-control" name="agilityLevel" required><br>
    <?= $install21 ?><br><input type="number" class="form-control" name="defenseLevel" required><br>
    <?= $install22 ?><br><input type="number" class="form-control" name="experienceLevel" required><br>
    <?= $install23 ?><br><input type="number" class="form-control" name="numberLevel" required><br>
    <?= $install24 ?><br><input type="number" class="form-control" name="skillPoints" required><br>
    <input type="submit" class="btn btn-success" name="Start_Installation" value="<?= $install25 ?>">
</form>

<?php include_once "footer.php"; ?>