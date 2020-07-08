<?php
function AOF_connect()
{
    //BDD connect
    try
    {
        if($GLOBALS['AOF_debugMode'] == true)
            $bdd = new PDO('mysql:host='.$GLOBALS['AOF_BDD_adress'].';dbname='.$GLOBALS['AOF_BDD_name'], $GLOBALS['AOF_BDD_login'], $GLOBALS['AOF_BDD_password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        else 
            $bdd = new PDO('mysql:host='.$GLOBALS['AOF_BDD_adress'].';dbname='.$GLOBALS['AOF_BDD_name'], $GLOBALS['AOF_BDD_login'], $GLOBALS['AOF_BDD_password']);

        return $bdd;
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
}
?>