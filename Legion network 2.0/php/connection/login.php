<?php 
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/getTable.php';

require '../other/crypte.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
$name = $_POST['name']; 
$password = $_POST['password'];   
$date = new Datetime('now', new DateTimeZone('Europe/Paris'));

if(!empty($password) and !empty($name))
{ 
    $password = crypter($password);
    $value = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_account'], $name, "minecraftpseudo");

    if($value['minecraftpseudo'] == $name && $value['password']== $password)
    {
        $_SESSION['id'] = $value['id'];
        $_SESSION['email'] = $value['email'];
        $_SESSION['user'] = $value['minecraftpseudo'];
        $_SESSION['rank'] = $value['rank'];
        $_SESSION['connect'] = 1;

        ?>
            <p class="bg-success"> Connexion en cours... </p>
            <meta http-equiv="refresh" content="1; URL=../../dashboard.php">
        <?php  
    }  
    else
    { 
        ?>
            <p class="bg-danger">Nom de compte ou mot de passe invalide. </p>
            <meta http-equiv="refresh" content="2; URL=../../index.php">
        <?php
    }     
}
else
{
    ?>
        <p class="bg-danger"> Certains champs ne sont pas remplit.</p>
        <meta http-equiv="refresh" content="2; URL=../../index.php">
    <?php
}
?>
    </div>
</body>
</html>