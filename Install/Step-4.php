<?php
    session_start();
    require_once '../Kernel/Functions/File.php';

    $language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$language}/Words.php";
	include_once "header.php";
	
    $databaseName = htmlspecialchars(addslashes($_POST['databaseName']));
    $databaseHost = htmlspecialchars(addslashes($_POST['databaseHost']));
    $databaseUser = htmlspecialchars(addslashes($_POST['databaseUser']));
    $databasePassword = htmlspecialchars(addslashes($_POST['databasePassword']));

    writeLanguageFile($language);
    writeSqlFile($databaseName, $databaseHost, $databaseUser, $databasePassword);
 if (file_exists('../Kernel/Config/SQL.php')) : ?>
    <form method="POST" action="Step-5.php">
    <?= $install12 ?>
    <br><br>
    <input type="submit" class="form-control btn btn-success" name="Choose_Curve" value="<?= $install13 ?>">
</form>
<?php else :
	echo $install14;
endif;
include_once "footer.php"; ?>