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
        <title>Légion Network - Joueurs en jeu.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheetAdmin.css" />
    </head>
    <body>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
      
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
                <div class="col-md-12 content">
                    <div class="tabbable ">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Personnage vivant</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Personnage Mort</a></li>
                          <li class=""><a href="#tab3" data-toggle="tab">Personnage Refusé</a></li>
                      </ul>

                      <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                          <table class="table"> <!-- VIVANT -->
                          <thead>
                            <tr>
                                <th>#id</th>
                                <th>Id de compte</th>
                                <th>Pseudo Minecraft</th>
                                <th>Nom du personnage</th>
                                <th>Infecté</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $reply = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                                while($data = $reply->fetch())
                                {
                                    if($data['playable'] == 1)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$data['id']."</td>";
                                        echo "<td>".$data['account_id']."</td>";
                                        echo "<td>".$data['minecraftpseudo']."</td>";
                                        echo "<td>".$data['CharacterName']."</td>";
                                        echo "<td>".$data['Infecte']."</td>";
                                        echo "<td>".$data['age']."</td>";
                                        ?>
                                        <td><a class="alert alert-danger" href="php/other/characterState.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['account_id'];?>&amp;result=refuse">Mort</a></td>
                                       <?php
                                        echo "</tr>";
                                    }
                                }
                                $reply->closeCursor();
                            ?>
                          </tbody>
                        </table>
                        </div>
                        <div class="tab-pane" id="tab2">
                          <table class="table"> <!-- MORT -->
                              <thead>
                                <tr>
                                  <th>#id</th>
                                  <th>Id de compte</th>
                                  <th>Pseudo Minecraft</th>
                                  <th>Nom du personnage</th>
                                  <th>Infecté</th>
                                  <th>Age</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                    $reply = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                                    while($data = $reply->fetch())
                                    {
                                        if($data['playable'] == -1)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$data['id']."</td>";
                                            echo "<td>".$data['account_id']."</td>";
                                            echo "<td>".$data['minecraftpseudo']."</td>";
                                            echo "<td>".$data['CharacterName']."</td>";
                                            echo "<td>".$data['Infecte']."</td>";
                                            echo "<td>".$data['age']."</td>";
                                            ?>
                                            <td><a class="alert alert-danger" href="php/other/characterState.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['account_id'];?>&amp;result=accept">Vivant</a></td>
                                           <?php
                                            echo "</tr>";
                                        }
                                    }
                                    $reply->closeCursor();
                                ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab3">
                          <table class="table"> <!-- AUTRE -->
                              <thead>
                                <tr>
                                  <th>#id</th>
                                  <th>Id de compte</th>
                                  <th>Pseudo Minecraft</th>
                                  <th>Nom du personnage</th>
                                  <th>Infecté</th>
                                  <th>Age</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                    $reply = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                                    while($data = $reply->fetch())
                                    {
                                        if($data['playable'] == 0)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$data['id']."</td>";
                                            echo "<td>".$data['account_id']."</td>";
                                            echo "<td>".$data['minecraftpseudo']."</td>";
                                            echo "<td>".$data['CharacterName']."</td>";
                                            echo "<td>".$data['Infecte']."</td>";
                                            echo "<td>".$data['age']."</td>";
                                        }
                                    }
                                    $reply->closeCursor();
                                ?>
                              </tbody>
                        </table>
                    </div>
                   </div>
                 </div>
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