<?php
//error_reporting(E_ALL | E_STRICT); 
session_start();

try
{
    $bdd = new PDO('mysql:host=sql-3.verygames.net;dbname=minecraft7752', 'minecraft7752', 'a7w2yrfgr');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
