<?php include("BDD.php");?>
<?php 
/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */

if($_SESSION['connect'] == 1)
{ ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Candidature</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="f../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
                     //Skin upload
                     $dossier = '../skin/';
                     $fichier = basename($_FILES['skinFile']['name']);

                            $fichier = $_SESSION['user'].'.png';
                            if(move_uploaded_file($_FILES['skinFile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné.
                            { 
                                echo '<p class="bg-success"> Changement de Skin effectuer ! </p>';  
                                    ?>
                                        <meta http-equiv="refresh" content="2; URL=../dashboard.php">
                                    <?php
                            }
                            else {
                                    echo '<p class="bg-danger"> Erreur lors de upload de Skin Minecraft ...</p>';
                                     ?>
                                        <meta http-equiv="refresh" content="2; URL=../dashboard.php">
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
    <meta http-equiv="refresh" content="1; URL=index.php">
<?php
 }
 ?>
