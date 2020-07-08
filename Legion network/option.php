<?php include("php/BDD.php"); ?>
<?php 

/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */

if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Option du network</title>
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
              <h1>Général:</h1>
                <div class="col-md-4" id="uploadSkin">
                    <form class="form-signin" enctype="multipart/form-data" action="php/option/background.php" method="post">
                        <h2><small style="color: #fff;">Image de fond de l'accueil:</small></h2>
                        <a href="http://yourphotodropper.aubega.com/"> <img style="width: 300px;" alt="YourPhotoDropper" src="http://yourphotodropper.aubega.com/img/YouPhotoDropper.png" > </a><br/>
                        <input type="file" name="skinFile" id="skin" required style="display: inline-block;">
                        <p>Image au format: .jpg uniquement. De préférence 1920*1018 px.</p>
                        <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Mettre en ligne</button>
                    </form>
                </div>

                <div class="col-md-8">
                    <form class="form-signin" action="php/option/general.php" method="post">
                        <input type="checkbox" name="maintenance" value="1"> Site en mode maintenance.
                        <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Sauvegarder modification</button>
                    </form>
                </div>
            </div>
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