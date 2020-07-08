<?php
// -----------------------------------------

// Aubega Open Framework
// Version 1.0
// Configuration file

// -----------------------------------------

function AOFInit()
{
    //Host
    $GLOBALS['AOF_HOST_name'] = "Aubega Open Framework website";

    //AOF
    $GLOBALS['AOF_version'] = "1.0.0";
    $GLOBALS['AOF_debugMode'] = true;
    $GLOBALS['AOF_session'] = true;
    $GLOBALS['AOF_cookie'] = false;

    //BDD
    $GLOBALS['AOF_BDD_adress'] = "sql-3.verygames.net";
    $GLOBALS['AOF_BDD_name'] = "minecraft7752";
    $GLOBALS['AOF_BDD_login'] = "minecraft7752";
    $GLOBALS['AOF_BDD_password'] = "a7w2yrfgr";

    $GLOBALS['AOF_BDD_TABLE_option'] = "legionOption";
    $GLOBALS['AOF_BDD_TABLE_article'] = "legionArticle";
    $GLOBALS['AOF_BDD_TABLE_account'] = "legionAccount";

    //LEGION NETWORK
    $GLOBALS['AOF_ENCODE_verygames'] = true;

    $GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'] = "legionCandidacy";
    $GLOBALS['AOF_BDD_TABLE_LEGION_character'] = "legionCharacter";
}

//DEBUG
function AOFAbout()
{
    include 'about.php';
}

function AOFCookie()
{
    include 'debug/cookie/index.php';
}
?>