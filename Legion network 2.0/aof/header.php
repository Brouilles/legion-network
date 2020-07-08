<?php
if($GLOBALS['AOF_debugMode'] == true)
    error_reporting(E_ALL | E_STRICT); 

if($GLOBALS['AOF_session'] == true)
    session_start();

if($GLOBALS['AOF_ENCODE_verygames'] == true)
{
    ini_set('default_charset', 'UTF-8');
    ini_set('mbstring.internal_encoding','UTF-8');
    ini_set('mbstring.func_overload',7);
    header('Content-Type: text/html; charset=UTF-8');
}
?>
