<?php
    session_start();
    $language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";
?>
<div class="important"><?= $install5 ?></div>
<?= $install6 ?>
<form method="POST" action="Step-4.php">
    <?= $install7 ?><br><input type="text" class="form-control" name="databaseName" required><br>
    <?= $install8 ?><br><input type="text" class="form-control" name="databaseHost" required><br>
    <?= $install9 ?><br><input type="text" class="form-control" name="databaseUser" required><br>
    <?= $install10 ?><br><input type="password" class="form-control" name="databasePassword"><br>
    <input type="submit" class="btn btn-success" name="Create_Configuration" value="<?= $install11 ?>">
</form>
<?php include_once "footer.php"; ?>