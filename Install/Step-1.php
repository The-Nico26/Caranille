<?php
    session_start();
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
