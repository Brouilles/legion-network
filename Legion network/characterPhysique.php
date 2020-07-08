<?php include("php/BDD.php"); ?>
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
        <title>Légion Network - Personnage description physique</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
        <script src="minecraft_skin.js" type="text/javascript"></script>
    </head>
    <body id="indexContent">
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
      
     <!-- HEADER -->
     <?php include'include/header.php'; ?>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="borderLegion col-md-12">
                <h1>Personnages, description physique:</h1>
                <?php 
                    $reply = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                    while($data = $reply->fetch())
                    {
                        if($data['playable'] == 1)
                        { ?>
                            <div class="col-md-3 minecraft_head" style="text-align: center;" id="<?php echo $data['minecraftpseudo']; ?>">
                                <a data-toggle="modal" data-target="<?php echo "#modal".$data['account_id']; ?>">
                                <canvas class="hat" id="<?php echo $data['minecraftpseudo']."_hat"; ?>"></canvas>
                                <script type="text/javascript">
                                    draw_hat('<?php echo $data['minecraftpseudo']."_hat"; ?>','<?php echo $data['minecraftpseudo']; ?>', 15);
                                </script>
                                <?php echo "<h4>".$data['CharacterName']."</h4>"; ?> </a>
                            </div>
                            <?php 
                                $stopCandid = 1;
                                $replyCandid = $bdd->query('SELECT * FROM legionCandidacy');
                                while($stopCandid != 0 && $dataCandid = $replyCandid->fetch())
                                {
                                    if($data['minecraftpseudo'] == $dataCandid['minecraftpseudo'])
                                    {
                                       $stopCandid = 0;
                                    }
                                    else
                                    {
                                       $stopCandid = 1;
                                    }
                                }
                                if($stopCandid == 0)
                                {
                                ?>
                                    <div class="modal fade" id="modal<?php echo $dataCandid['poster_id']; ?>" style="color: #000; font-family: Arial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Fiche de: <?php echo $data['CharacterName']; ?></h4>
                                              </div>
                                              <div class="modal-body">
                                               <?php echo "<strong>Description physique:</strong>"; echo "<br/>";
                                               echo Stripslashes($dataCandid['paragraphePresentation']); ?>
                                           
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button> <br/> <br/>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                            <?php  }  ?>
               <?php    }
                     }
                     $reply->closeCursor();
                ?>
            </div>

            <?php include 'include/adminPanel.php'?>
            <?php include 'include/footer.php'?>
        </div>
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