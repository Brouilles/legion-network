<?php  setcookie('authe', 'Auth cookie', time() + 3600*24*3); 
 setcookie ("pseudo", "LA GLOBULE", time() + 365*24*3600); ?>
<?php include("../BDD.php"); ?>
<?php include("../other/crypte.php");
 /* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */
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

$stop = 1;

if(!empty($password) and !empty($name))
{ 
    $password = crypter($password);
            $reply = $bdd->query('SELECT * FROM legionAccount');
            while($stop != 0 && $data = $reply->fetch())
            {
                if($name == $data['minecraftpseudo'] && $password == $data['password'])
                {
                   $stop = 0;
                }
                else
                {
                    $stop = 1;
                }
            }
           
            if($stop == 0)
            {
                if($data['rank'] == 0 || $data['rank'] == 1 || $data['rank'] == 2)
                {
                     $req = $bdd->prepare('UPDATE legionAccount SET lastlogin = :lastlogin WHERE id = '.$data['id']);
                     $req->execute(array(
                           'lastlogin' => $date->format('Y-m-d H:i:s')
	                        ));               

                     $_SESSION['id'] = $data['id'];
                     $_SESSION['email'] = $data['email'];
                     $_SESSION['user'] = $data['minecraftpseudo'];
                     $_SESSION['rank'] = $data['rank'];
                     $_SESSION['connect'] = 1;

                     //Success
                     $reply->closeCursor();
                     echo '<p class="bg-success"> Connexion en cours... </p>';
                     ?>
                       <meta http-equiv="refresh" content="1; URL=../../dashboard.php">
                    <?php
                }
                elseif($data['rank'] == -1)
                {
                   echo '<p class="bg-danger">Compte suspendu pour non respect aux règles ou tentative frauduleuse.</p>';
                 ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php 
                }
                else
                echo '<p class="bg-danger">Erreur Inconnu: rang de compte.</p>';
                 ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php 
            }
            else
            {   //Error
                 echo '<p class="bg-danger">Nom de compte ou mot de passe invalide. </p>';
                 ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
            }
}
else
{
    echo '<p class="bg-danger"> Certains champs ne sont pas remplit  </p>';
    ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
}
?>
    </div>
</body>
</html>

