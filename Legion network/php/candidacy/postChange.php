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
        <title>légion Network - Candidature</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php  
///Paragraphe
$paragraphePresentation = $_POST['paragraphePresentation'];
$paragraphePresentationMental = $_POST['paragraphePresentationMental'];

$CandidId = $_POST['CandidId'];

            if(!empty($paragraphePresentation) and !empty($paragraphePresentationMental) and !empty($CandidId))
            {
              
                $req = $bdd->prepare('UPDATE legionCandidacy SET paragraphePresentation = :paragraphePresentation, paragraphePresentationMental = :paragraphePresentationMental WHERE id = '.$CandidId);
                             $req->execute(array(
                                   'paragraphePresentation' => $paragraphePresentation,
                                   'paragraphePresentationMental' => $paragraphePresentationMental
	                                )); 

                                    //Finish
                                    echo '<p class="bg-success"> Modification effectuer. </p>';
                                             ?>
                                               <meta http-equiv="refresh" content="2; URL=../../dashboard.php">
                                            <?php
             }
             else
             {
                 echo '<p class="bg-danger"> Certains champs ne sont pas remplit.</p>';
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
 ?>
