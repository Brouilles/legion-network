<?php
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
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

if(!empty($name) and !empty($mail))
{ 
                 $bdd = AOF_connect();
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
