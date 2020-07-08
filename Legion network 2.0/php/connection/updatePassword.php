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
        <title>légion Network - Mise à jour du compte, mot de passe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
$actualPassword = $_POST['actualPassword']; 
$newPassword = $_POST['newPassword'];   

$stop = 1;

if(!empty($actualPassword) and !empty($newPassword))
{ 
    $bdd = AOF_connect();
    $actualPassword = crypter($actualPassword);
    $reply = $bdd->query('SELECT * FROM legionAccount');
            while($stop != 0 && $data = $reply->fetch())
            {
                if($_SESSION['user'] == $data['minecraftpseudo'] && $_SESSION['id'] == $data['id'])
                {
                   $stop = 0;
                }
                else
                {
                    $stop = 1;
                }
            }
           
            if($stop == 0 && $data['password'] ==  $actualPassword)
            {
                 $newPassword = crypter($newPassword);
                 $req = $bdd->prepare('UPDATE legionAccount SET password = :password WHERE id='.$data['id']);
                 $req->execute(array(
                       'password' => $newPassword
	                    )); 

                 echo '<p class="bg-success"> Modification effectuer avec succès, Mot de passe changé . </p>';
                 ?>
                   <meta http-equiv="refresh" content="1; URL=../../dashboard.php">
                <?php
            }
            else
            {
                echo '<p class="bg-danger">Mot de passe invalide.</p>';
                 ?>
                   <meta http-equiv="refresh" content="2; URL=../../dashboard.php">
                <?php
            }
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
