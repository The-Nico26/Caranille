<?php
session_start();
ob_start();
$config = 'Kernel/Config/Server.php';
$size = filesize($config);
if ($size == 0) 
{
    require_once 'Kernel/Functions/File.php';
    writeServerFile(dirname(__FILE__), $_SERVER['PHP_SELF'], $_SERVER['HTTP_HOST']);
    exit(header("Location: Install/Step-1.php"));
}
require_once 'Kernel/Config/Server.php';
require_once 'Kernel/Functions/Security.php';
initialiseConnection($fileRoot, $linkRoot);