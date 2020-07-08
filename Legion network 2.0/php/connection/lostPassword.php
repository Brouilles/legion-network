<?php 
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/getTable.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Réinitaliser mot de passe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
$name = $_POST['name']; 
$email = $_POST['email'];
$minEmail = strtolower($email);

//Date
$day = date("d");
$month = date("m");
$year = date("Y");

$time = date("H");
$minutes = date("i");

$stop = 1;
if(!empty($email) and !empty($name))
{
    $bdd = AOF_connect();
    $reply = $bdd->query('SELECT * FROM legionAccount');
    while($stop != 0 && $data = $reply->fetch())
    {
        if($name == $data['minecraftpseudo'] && $minEmail == $data['email'])
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
        $chaine = "abcdefghijklmnopqrstuvwxyz0123456789"; // Types des caractères  
        srand((double)microtime()*1000000);  
        for($i=0; $i<8; $i++) // Nombre de caractères (ici 8)  
        {  
            $pass .= $chaine[rand()%strlen($chaine)]; // On génère le mot de passe de 8 caractères  
        }  
        $newPassword = crypter($pass);

                 $req = $bdd->prepare('UPDATE legionAccount SET password = :password WHERE id='.$data['id']);
                 $req->execute(array(
                       'password' => $newPassword
	                    )); 

        $message = "Légion Network - Réinitalisation de mot de passe \n
                    Vous avez oublié le mot de passe de votre compte ? \n
                    Voici votre nouveau mot de passe: ".$pass;

        mail($minEmail, "Titre: Mot de passe | Legion Minecraft", "Envoyer par Légion serveur Minecraft le ".$day."/".$month."/".$year." à ".$time.":".$minutes." \n \n ".$message);
        echo '<p class="bg-success"> Modification effectuer avec succès, le nouveau mot de passe est accessible sur votre adresse mail. </p>';
        ?>
            <meta http-equiv="refresh" content="3; URL=../../dashboard.php">
       <?php
    }
    else
    {
           echo '<p class="bg-danger"> Pseudo minecraft ou adresse Mail invalide.  </p>';
    ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php 
    }
}
else
{
    echo '<p class="bg-danger"> Certains champs ne sont pas remplit.  </p>';
    ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
}
?>
    </div>
</body>
</html>