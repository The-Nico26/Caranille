<?php
    session_start();

    $language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";
?>
    <div class="important"><?= $install29 ?></div><br><br>
    <?= $install30 ?>
    <form method="POST" action="Step-8.php">
        <?= $install31 ?><br> <input type="text" name="rpgName" class="form-control" autofocus required><br>
        <?= $install32 ?><br> <textarea name="Presentation" ID="Presentation" class="form-control" required></textarea><br>
        <?= $install33 ?><br> <input type="text" name="Pseudo" class="form-control" required><br>
        <?= $install34 ?><br> <input type="password" name="Password" class="form-control" required><br>
        <?= $install35 ?><br> <input type="password" name="Password_Confirm" class="form-control" required><br>
        <?= $install36 ?><br> <input type="email" name="Email" class="form-control"><br>
        <input type="submit" name="Finish" class="btn btn-success" value="<?= $install37 ?>">
    </form>
<?php include_once "footer.php"; ?>