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
        <title>Légion Network - Membres</title>
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
                 <h1>Membres:</h1>
                 <table class="table">
                  <thead>
                    <tr>
                      <th>#id</th>
                      <th>Pseudo Minecraft</th>
                      <th>Email</th>
                      <th>Création du compte</th>
                      <th>Dernière connexion</th>
                      <th>Rang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $reply = $bdd->query('SELECT * FROM legionAccount ORDER BY id DESC');
                        while($data = $reply->fetch())
                        {
                            if($data['rank'] == 0 || $data['rank'] == 1) {
                                echo "<tr class='success'>";
                            }
                            elseif($data['rank'] == -1) {
                                echo "<tr class='danger'>";
                            }
                            else {
                                echo "<tr>";
                            }

                            echo "<td>".$data['id']."</td>";
                            echo "<td>".$data['minecraftpseudo']."</td>";
                            echo "<td>".$data['email']."</td>";
                            echo "<td>".$data['created']."</td>";
                            echo "<td>".$data['lastlogin']."</td>";
                            echo "<td>".$data['rank']."</td>"; 

                            if($data['rank'] == 0) 
                            {
                            ?>
                            <td><a class="alert alert-danger" href="php/connection/ban.php?id=<?php echo $data['id'];?>">Bannir le compte</a></td>
                           <?php }else {
                                echo "<td>Ban Impossible</td>"; 
                                 }
                             echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
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