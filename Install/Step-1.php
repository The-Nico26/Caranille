<?php
    session_start();
	require_once '../Kernel/Config/Server.php';
	require_once '../Kernel/Functions/Security.php';
	$_SESSION['File_Root'] = $fileRoot;
    $_SESSION['Link_Root'] = $linkRoot;
	include_once "header.php";
?>

<form method="POST" action="Step-2.php">
    <label for="Language">Choose your language :</label><hr>
    <select name="language" class="form-control" id="Language">
        <option value="En">Anglais</option>
        <option value="Fr">Français</option>
    </select><hr>
    <input type="submit" class="btn btn-success form-control" name="Install" value="Install">
</form>

<?php include_once "footer.php"; ?>
