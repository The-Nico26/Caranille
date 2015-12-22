<?php

$timeStart = microtime(true);
session_start();

require_once $_SESSION['File_Root'].'/Kernel/Include.php';
require_once $_SESSION['File_Root'].'/HTML/Header.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);

echo "<form method=\"POST\" action=\"Terminal.php\">
<input type=\"text\" class=\"form-control\" placeholder=\"Terminal\" aria-describedby=\"basic-addon1\" name=\"shellCommand\" required autofocus>
</form>";

require_once $_SESSION['File_Root'].'/HTML/Footer.php';

?>