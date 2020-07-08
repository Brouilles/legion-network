<?php include("php/BDD.php"); ?>
<?php
    
/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */

if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 1 || $_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Candidature en attente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheetAdmin.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="tabdrop/css/tabdrop.css" />
    </head>
    <body>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="tabdrop/js/bootstrap-tabdrop.js"></script>
      
     <!-- HEADER -->
     <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://legion.verygames.net/">Site internet</a></li>
          <li><a href="http://legion.verygames.net/forum/">Forum</a></li>
          <li><a href="http://legion.verygames.net/">|</a></li>
          <li><a href="dashboard.php"><?php echo $_SESSION['user'];?></a></li>
          <li><a href="php/connection/disconnect.php">Déconnexion</a></li>
        </ul>
        <h3 class="text-muted">Légion Network</h3>
     </div>    

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
                <?php
                   if($_SESSION['user'] == "k_cham" || $_SESSION['user'] == "Brouilles" || $_SESSION['user'] == "hermite47") //$_SESSION['user'] == "Webley_Mark" || 
                   { ?>
                        <div style="text-align: center;" class="col-md-12">
                            <img style="height: 260px;" src="http://www.allo-image.net/stockimg/upload/1908176324741aa45a0646drapeau_francais_svg.jpg" alt="Vive la France !">
                            <audio src="img/athem.mp3" autoplay></audio>
                        </div>
            <?php  }
                ?>

            <div class="col-md-12 content">
                <div class="tabbable ">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Candidature en attente</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Candidature accepté</a></li>
                    <li><a href="#tab3" data-toggle="tab">Candidature refusé</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <table class="table"> <!-- EN ATTENTE -->
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>Id de compte</th>
                          <th>Date de la demande</th>
                          <th>Nom du personnage RP</th>
                          <th>En détaille...</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $reply = $bdd->query('SELECT * FROM legionCandidacy');
                            while($data = $reply->fetch())
                            {
                                if($data['state'] == 0)
                                {
                                    echo "<tr>";
                                    echo "<td>".$data['id']."</td>";
                                    echo "<td>".$data['poster_id']."</td>";
                                    echo "<td>".$data['date']."</td>";
                                    echo "<td>".$data['name']."</td>";
                                    echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$data['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                    echo "</tr>";
                                }
                            }
                            $reply->closeCursor();
                        ?>
                      </tbody>
                    </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <table class="table"> <!-- ACCEPTE -->
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>Id de compte</th>
                              <th>Date de la demande</th>
                              <th>Nom du personnage RP</th>
                              <th>Modération</th>
                              <th>En détaille...</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $reply = $bdd->query('SELECT * FROM legionCandidacy ORDER BY id DESC');
                                while($data = $reply->fetch())
                                {
                                    if($data['state'] == 1)
                                    {
                                        echo "<tr class='success'>";
                                        echo "<td>".$data['id']."</td>";
                                        echo "<td>".$data['poster_id']."</td>";
                                        echo "<td>".$data['date']."</td>";
                                        echo "<td>".$data['name']."</td>";
                                        echo "<td>".$data['modoTreatment']."</td>";
                                        echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$data['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                        echo "</tr>";
                                    }
                                }
                                $reply->closeCursor();
                            ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab3">
                      <table class="table"> <!-- REFUSE -->
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>Id de compte</th>
                              <th>Date de la demande</th>
                              <th>Nom du personnage RP</th>
                              <th>Modération</th>
                              <th>En détaille...</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $reply = $bdd->query('SELECT * FROM legionCandidacy ORDER BY id DESC');
                                while($data = $reply->fetch())
                                {
                                    if($data['state'] == -1)
                                    {
                                        echo "<tr class='danger'>";
                                        echo "<td>".$data['id']."</td>";
                                        echo "<td>".$data['poster_id']."</td>";
                                        echo "<td>".$data['date']."</td>";
                                        echo "<td>".$data['name']."</td>";
                                        echo "<td>".$data['modoTreatment']."</td>";
                                        echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$data['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                        echo "</tr>";
                                    }
                                }
                                $reply->closeCursor();
                            ?>
                          </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                <?php 
                        $reply = $bdd->query('SELECT * FROM legionCandidacy');
                            while($data = $reply->fetch())
                            {
                                if($data['state'] == 0 || $data['state'] == 1 || $data['state'] == -1)
                                { ?>
                                    <div class="modal fade" id="modal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                echo "<strong>Compétence:</strong>"; 
                                                echo "<br/>";

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
                                                
                                                //Commentaire du modérateur.
                                                if($data['state'] == -1 || $data['state'] == 1)
                                                {
                                                    ?>
                                                        <div style="width: 100%; height: 3px; background-color: #0094ff; margin-top: 20px;"></div>
                                                    <?php 

                                                    echo "<strong>Commentaire de ".$data['modoTreatment'].":</strong> <br/>";
                                                    echo Stripslashes($data['modoComment']);
                                                }
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
                                            <form action="php/candidacy/treatment.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['poster_id'];?>&amp;mail=<?php echo $dataLegionAccount['email'];?>&amp;result=accept" method="post">
                                                 <textarea class="form-control" required name="commentaire" placeholder="Commentaire sur la candidature."></textarea>    <br/>
                                                 <button class="btn btn-success" type="submit">Accepté Candidature</button> <br/> <br/>
                                            </form>
                                            <form action="php/candidacy/treatment.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['poster_id'];?>&amp;mail=<?php echo $dataLegionAccount['email'];?>&amp;result=refuse" method="post">
                                              <textarea class="form-control" required name="commentaire" placeholder="Information sur le refus."></textarea>    <br/>
                                              <button class="btn btn-danger" type="submit">Refusé Candidature</button>
                                            </form>
                                          </div>
                                            <?php } $replyLegionAccount->closeCursor(); ?>
                                        </div>
                                      </div>
                                    </div>
                             <?php   }
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