<?php include("../BDD.php");?>
<?php 
/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */

if($_SESSION['connect'] == 1)
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Mise à jour du compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
$name = $_POST['name']; 
$mail = $_POST['email'];   

$stop = 1;

if(!empty($name) and !empty($mail))
{ 
                 $req = $bdd->prepare('UPDATE legionAccount SET minecraftpseudo = :minecraftpseudo, email = :email WHERE id = '.$_SESSION['id']);
                 $req->execute(array(
                       'minecraftpseudo' => $name,
                       'email' => $mail
	                    )); 

                 echo '<p class="bg-success"> Modification effectuer avec succès, prendra effet à votre prochaine connexion. </p>';
                 ?>
                   <meta http-equiv="refresh" content="1; URL=../../dashboard.php">
                <?php
}
else
{
    echo '<p class="bg-danger">Certains champs ne sont pas remplit.</p>';
    ?>
                   <meta http-equiv="refresh" content="2; URL=../../dashboard.php">
                <?php
}
?>
    </div>
</body>
</html>
<?php
 }
 else
 {
 ?>
    <meta http-equiv="refresh" content="1; URL=../../dashboard.php">
<?php
 }
 ?>
