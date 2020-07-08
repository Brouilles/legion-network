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
        <title>Légion Network - Compte</title>
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
            <?php 
                $candidacyNumber = 0;
                $candidacyNumberAttente = 0;
                $account = 0;
                $reply = $bdd->query('SELECT * FROM legionCandidacy');
                        while($data = $reply->fetch())
                        {
                            $candidacyNumber = $candidacyNumber + 1;

                            if($data['state'] == 0)
                            {
                                $candidacyNumberAttente = $candidacyNumberAttente + 1;
                            }
                        }
                        $reply->closeCursor();

                $reply = $bdd->query('SELECT * FROM legionAccount');
                        while($data = $reply->fetch())
                        {
                            $account = $account + 1;
                        }
                        $reply->closeCursor();
            ?>
            <div class="col-md-12"> <div class="alert alert-info">Actuellement <? echo $candidacyNumber; ?> candidatures dont <?php echo $candidacyNumberAttente; ?> en attentes, <?php echo $account; ?> inscrits.</div> </div> 
            
            <?php
            if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 1 || $_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
            {
                ?>
                    <div class="col-md-12 alert alert-success">Roadmap: 07/06/2014 Correction de bug / Ajout des points de compétence sur candidature nouvelle et ancienne.</div>
                    <div class="col-md-12 alert alert-danger">Roadmap: 14/05/2014 Page "Option du Network" en réalisation, merci de ne pas l'utilisé.</div>
                <?php
            }

             include 'php/candidacy/changeParagraphe.php';
            
            ?>

            <div class="col-md-8 content">
                <div class="borderLegion col-md-12">

                   <h1>Liens utiles:</h1>
                   <a class="col-md-5 mumble" href="mumble://mumble-4.verygames.net:50431/?serverversion=1.2.0&amp;version=1.2.0" title="Lancer le Mumble de Legion"> <img alt="mumble" src="http://legion.verygames.net/wp-content/uploads/2014/04/mumble2.png" onmouseover="this.src='http://legion.verygames.net/wp-content/uploads/2014/04/mumble1.png'" onmouseout="this.src='http://legion.verygames.net/wp-content/uploads/2014/04/mumble2.png'"></a>
                   <a class="col-md-3" style="margin-top: 10px;" href="http://www.minecraft-serveur.com/vote.php?id=1294" title="Votez"> <img src="http://legion.verygames.net/wp-content/uploads/2014/05/Votez11.png" onmouseover="this.src='http://legion.verygames.net/wp-content/uploads/2014/05/Votez21.png'" onmouseout="this.src='http://legion.verygames.net/wp-content/uploads/2014/05/Votez11.png'" alt="Votez"></a>
                   <?php 
                    $stopCharacter = 1;
                    $reply = $bdd->query('SELECT * FROM legionCharacter');
                    while($stopCharacter != 0 && $data = $reply->fetch())
                    {
                        if($data['account_id'] == $_SESSION['id'] && $data['playable'] == 1)
                        {
                            $stopCharacter = 0;
                        }
                        else
                        {
                            $stopCharacter = 1;
                        }
                     }
                        
                     if($stopCharacter == 0)
                     { ?>
                        <a href="characterPhysique.php" class="btn btn-primary btn-lg"> Description Physique des personnages </a>
                    <?php } ?>
                </div>
                <div class="borderLegion col-md-12">
                    <h1>Information sur le compte:</h1>
                    <form class="form-signin" action="php/connection/updateAccount.php" method="post">
                        Pseudo de compte/Minecraft: <input class="form-control" required type="text" name="name" value="<?php echo $_SESSION['user']; ?>"><br/>
                        Adresse Mail: <input class="form-control" required name="email" type="email" value="<?php echo $_SESSION['email']; ?>"><br/>
                    <button class="btn btn-primary btn-block" style="width: 360px;" type="submit">Sauvegarder les modifications</button>
                  </form> <br/>
                  <form class="form-signin" action="php/connection/updatePassword.php" method="post">
                        Mot de passe actuel: <input class="form-control" required type="password" name="actualPassword"><br/>
                        Nouveau Mot de passe: <input class="form-control" required type="password" name="newPassword"><br/>
                    <button class="btn btn-primary btn-block" style="width: 360px;" type="submit">Changer de mot de passe</button>
                  </form> <br/>
              </div>
            </div>

            <div class="col-md-1"></div>

            <div class="borderLegion col-md-3 content">
                <h3>Personnage:</h3>
                <?php
                $stopCharacter = 1;
                $reply = $bdd->query('SELECT * FROM legionCharacter');
                while($stopCharacter != 0 && $data = $reply->fetch())
                {
                    if($data['account_id'] == $_SESSION['id'] && $data['playable'] == 1)
                    {
                        $stopCharacter = 0;
                    }
                    else
                    {
                        $stopCharacter = 1;
                    }
                 }
                        
                 if($stopCharacter == 0)
                 {

                    $stop = 1;
                    $reply = $bdd->query('SELECT * FROM legionCandidacy ORDER BY id DESC');
                        while($stop != 0 && $data = $reply->fetch())
                        {
                            if($data['poster_id'] == $_SESSION['id'] && $data['state'] == 1)
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
                              ?>
                            <div class="playerInfo">
                                   <div class="minecraft_model" id="<?php echo $data['minecraftpseudo']; ?>">
                                        <canvas class="scratch" id="<?php echo $data['minecraftpseudo']; ?>_scratch"></canvas><canvas class="model" id="<?php echo $data['minecraftpseudo']; ?>_model"></canvas>
                                        <script type="text/javascript">
                                            draw_model('<?php echo $data['minecraftpseudo']; ?>_model','<?php echo $data['minecraftpseudo']; ?>_scratch','<?php echo $data['minecraftpseudo']; ?>',6,true);
                                        </script>
                                    </div>
                                    <div class="modal fade" id="modalTexture" style="color: #000; font-family: Arial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Changement de skin: <?php echo $data['minecraftpseudo']; ?></h4>
                                          </div>
                                          <div class="modal-body" id="uploadSkin">
                                             <form enctype="multipart/form-data" action="php/skinUpload.php" method="post">
                                                 <h2><small style="color: #fff;">Skin</small></h2>
                                                 <a href="http://yourphotodropper.aubega.com/"> <img style="width: 300px;" alt="YourPhotoDropper" src="http://yourphotodropper.aubega.com/img/YouPhotoDropper.png" > </a><br/>
                                                 <input type="file" name="skinFile" id="skin" required style="display: inline-block;">
                                                 <p>Image au format: .png uniquement !</p>
                                                 <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
                                             </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                     <?php
                                    echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalTexture"> <span class="glyphicon glyphicon-plus"></span> Changer de Skin </button> </td>';
                                    echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$data['id'].'"> <span class="glyphicon glyphicon-resize-full"></span> </button> </td>';
                                    echo "<br/> <strong>Général</strong>"; echo "<br/>";
                                    echo "Nom: ".$data['name'];
                                    echo "<br/>";
                                    echo "Prénom: ".$data['firstName'];
                                    echo "<br/>";
                                    echo "Age: ".$data['age'];
                                    echo "<br/>";
                                    echo "Infecté (1 oui, 0 non): ".$data['ethnie'];
                                    echo "<br/>"; echo "<br/>"; ?>
                                </div>

                                <div class="modal fade" id="modal<?php echo $data['id']; ?>" style="color: #000; font-family: Arial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Candidature de: <?php echo $data['minecraftpseudo']; ?></h4>
                                      </div>
                                      <div class="modal-body">
                                        <?php
                                            echo "<strong>Présentation IRL:</strong>"; echo "<br/>";
                                            echo Stripslashes($data['paragrapheIRL']);
                                            echo "<br/>"; echo "<br/>";
                                            echo "<strong>Général</strong>"; echo "<br/>";
                                            echo "Nom: ".$data['name'];
                                            echo "<br/>";
                                            echo "Prénom: ".$data['firstName'];
                                            echo "<br/>";
                                            echo "Age: ".$data['age'];
                                            echo "<br/>";
                                            echo "Infecté (1 oui, 0 non): ".$data['ethnie'];
                                            echo "<br/> <br/>";
                                            echo "<strong>Compétence:</strong>"; echo "<br/>";

                                                $actualPoint = 0;
                                                $pointAttrib = 0;
                                                $compNumber = 0;

                                                if ($data['age'] < 3) {
                                                    $actualPoint = 0;
                                                }
                                                else if ($data['age'] >= 3 && $data['age'] < 8) {
                                                    $actualPoint = ($data['age'] * 2) - 3;
                                                }
                                                else if ($data['age'] >= 8 && $data['age'] < 30) {
                                                    $actualPoint = ($data['age'] * 4) - 3;
                                                }
                                                else if ($data['age'] >= 30) {
                                                    $actualPoint = 117;
                                                }

                                                $stop = 1;
                                                $replyAccount = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                                                while($stop != 0 && $dataAccount = $replyAccount->fetch())
                                                {

                                                    if($data['poster_id'] == $dataAccount['account_id'])
                                                    {
                                                        $stop = 0;
                                                    }
                                                    else
                                                    {
                                                        $stop = 1;
                                                    }
                                                        
                                                    if($stop == 0)
                                                    {
                                                        $replyAccountSkill = $bdd->query('SELECT * FROM legionCharacterAndSkill');
                                                        while($dataAccountSkill = $replyAccountSkill->fetch())
                                                        {
                                                            if($dataAccount['id'] == $dataAccountSkill['IdCharacter'])
                                                            {
                                                                $replySkill = $bdd->query('SELECT * FROM legionSkill');
                                                                while($dataSkill = $replySkill->fetch())
                                                                {
                                                                    if($dataAccountSkill['IdSkill'] == $dataSkill['Id'])
                                                                    {
                                                                        $compNumber += 1;
                                                                        echo $dataSkill['Name'].' : Id = ';
                                                                    }
                                                                }
                                                               echo $dataSkill['IdSkill'].'<br/>';
                                                            }
                                                        }
                                                    }
                                                }
                                                $actualPoint = $actualPoint + ($compNumber * -25) + 25;
                                                echo "<br/><strong>Points attribuer restant:".$actualPoint."</strong>";

                                            echo "<br/>"; echo "<br/>"; 
                                            echo "<strong>Skin Minecraft:</strong>"; ?>
                                                <img alt="Skin" style="height: 100px;" src="http://legion.verygames.net/legionnetwork/skin/<?php echo $data['minecraftpseudo']; ?>.png">
                                            <?php
                                            echo "<br/>"; echo "<br/>"; 
                                            echo "<strong>Présentation physique:</strong>"; echo "<br/>";
                                            echo Stripslashes($data['paragraphePresentation']);

                                            echo "<br/>"; echo "<br/>"; 
                                            echo "<strong>Présentation Mental:</strong>"; echo "<br/>";
                                            echo Stripslashes($data['paragraphePresentationMental']);

                                            echo "<br/>";  echo "<br/>"; 
                                            echo "<strong>Paragraphe RP:</strong>"; echo "<br/>";
                                            echo Stripslashes($data['paragrapheRP']);
                                        ?>
                                      </div>
                                     <?php 
                                         $stop = 1;
                                         $replyLegionAccount = $bdd->query('SELECT * FROM legionAccount');
                                            while($stop != 0 && $dataLegionAccount = $replyLegionAccount->fetch())
                                            {
                                                if($data['poster_id'] == $dataLegionAccount['id'])
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
                                        ?>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button> <br/> <br/>
                                      </div>
                                        <?php } ?>
                                    </div>
                                  </div>
                                </div>
                                <p class="bg-danger"><a href="php/candidacy/alert.php">Nouvelle Candidature.</a> Attention, votre personnage actuel sera remplacé par le nouveau !</p>
                             <?php
                        }
                 }
                 else{
                  ?>
                    <p class="bg-danger">Vous n'avez pas de personnage sur le serveur. <a href="candidacy.php">Faite une candidature !</a></p>
                <?php
                        }
                        $reply->closeCursor();
                ?>
            </div>

            <div class="col-md-1"></div>
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