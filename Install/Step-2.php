<?php
   session_start();
    $_SESSION['Language'] = htmlspecialchars(addslashes($_POST['language']));
    $Language = $_SESSION['Language'];
    require_once "../Kernel/Locales/{$Language}/Words.php";
	include_once "header.php";
?>

<div class="important"><?= $install1 ?></div>
<p>
    <?= $install2; ?>
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/deed.fr">
        <img alt="Licence Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by/4.0/88x31.png">
    </a><br>
    Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by/4.0/deed.fr">Licence Creative Commons Attribution 4.0 International</a>.
    <br><br>
    <iframe src="../LICENCE.txt"></iframe>
    <br><br>
<form method="POST" action="Step-3.php">
    <input type="submit"class="btn btn-success" name="Accept" value="<?= $install3 ?>"><br><br>
    <div class="important"><?= $install4 ?></div>
</form>
<?php include_once "footer.php"; ?>