<?php
    
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
        <title>Légion Network - Légion live</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="tabdrop/css/tabdrop.css" />
    </head>
    <body id="indexContent">
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="tabdrop/js/bootstrap-tabdrop.js"></script>
      
     <!-- HEADER -->
     <div class="header navbar navbar-inverse navbar-fixed-top">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://legion.verygames.net/">Site internet</a></li>
          <li><a href="http://legion.verygames.net/legionnetwork/">Légion network</a></li>
          <li><a href="http://legion.verygames.net/forum/">Forum</a></li>
        </ul>
        <h3 class="text-muted">Légion Network</h3>
     </div>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <h1>Légion live:</h1>
            <div class="borderLegion col-md-12 ">
                <div class="col-md-6">
                    <h3>>Planning:</h3
                    <ul>
                        <li> Pas de live </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h3>>Liens utiles:</h3>
                       <a class="col-md-6 mumble" href="mumble://mumble-4.verygames.net:50431/?serverversion=1.2.0&amp;version=1.2.0" title="Lancer le Mumble de Legion"> <img alt="mumble" src="http://legion.verygames.net/wp-content/uploads/2014/04/mumble2.png" onmouseover="this.src='http://legion.verygames.net/wp-content/uploads/2014/04/mumble1.png'" onmouseout="this.src='http://legion.verygames.net/wp-content/uploads/2014/04/mumble2.png'"></a>
                       <a class="col-md-3" style="margin-top: 10px;" href="http://www.minecraft-serveur.com/vote.php?id=1294" title="Votez"> <img src="http://legion.verygames.net/wp-content/uploads/2014/05/Votez11.png" onmouseover="this.src='http://legion.verygames.net/wp-content/uploads/2014/05/Votez21.png'" onmouseout="this.src='http://legion.verygames.net/wp-content/uploads/2014/05/Votez11.png'" alt="Votez"></a>
                </div>

                <div class="col-md-12" style="text-align: center; margin-top: 30px;">
                    <h1>Pas de live disponible</h1>
                   </div>
                 </div>
            </div>
            <?php include 'include/footer.php'?>
        </div>
    </div>
    </body>
</html>
