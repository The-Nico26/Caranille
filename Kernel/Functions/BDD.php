<?php
//LAUNCH THE CONNECTION
try 
{
    $bdd = new PDO($Dsn, $User, $Password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    echo 'An error as occurred, Cannot connect to the database. Error: '.$e->getMessage();
}