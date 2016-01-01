<?php
$timeStart = microtime(true);
session_start();

if (empty($_SESSION)) { exit(header("Location: ../../index.php")); }

require_once $_SESSION['File_Root']. '/Kernel/Include.php';
require_once $_SESSION['File_Root']. '/HTML/Header.php';
require_once 'Functions/SQL.php';

redirectToLogin($accountID, $linkRoot);
redirectToBattle($verifyBattle, $linkRoot);
hasAdmin($accountAccess);

if(isset($_POST['Edit']))
{
	$configurationName = htmlspecialchars(addslashes($_POST['configurationName']));
	$configurationPresentation = htmlspecialchars(addslashes($_POST['configurationPresentation']));
	$configurationAccess = htmlspecialchars(addslashes($_POST['configurationAccess']));
	
	updateConfiguration($bdd, $confName, $confPresentation, $confAccess);
	
	exit(header("Location: $linkRoot/Admin/index.php"));
}

require_once $_SESSION['File_Root'] .'/HTML/Footer.php'; ?>