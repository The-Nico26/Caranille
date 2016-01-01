<?php

function writeLanguageFile($language)
{
    $openLocales = fopen('../Kernel/Config/Locales.php', 'w');
    fwrite($openLocales, "
    <?php
    \$language = '$language';
    ?>");
    fclose($openLocales);
}

function writeServerFile($file, $PHP_SELF, $HTTP_POST)
{
    if (dirname($PHP_SELF) == '\\') 
    {
        if ($HTTP_POST == 'localhost') 
        {
            $link = 'http://localhost';
        } 
        else 
        {
            $link = 'http://'.$HTTP_POST;
        }
    } 
    else 
    {
        if ($HTTP_POST == 'localhost') 
        {
            $link = 'http://localhost'.dirname($PHP_SELF);
        } 
        else 
        {
            $link = 'http://'.$HTTP_POST.dirname($PHP_SELF);
        }
    }

    $openServer = fopen('Kernel/Config/Server.php', 'w');

    fwrite($openServer, "
    <?php
    \$fileRoot = '$file';
    \$linkRoot = '$link';
    ?>");

    fclose($openServer);
}

function writeSQLFile($databaseName, $databaseHost, $databaseUser, $databasePassword)
{
    $openSql = fopen('../Kernel/Config/SQL.php', 'w');
    fwrite($openSql, "
    <?php
    //Version of Caranille
    \$version = \"1.2.1\";
    \$Dsn = 'mysql:dbname=$databaseName;host=$databaseHost';
    \$User = '$databaseUser';
    \$Password = '$databasePassword';
    ?>");
    fclose($openSql);
}
