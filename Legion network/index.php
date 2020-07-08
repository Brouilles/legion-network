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
<meta http-equiv="refresh" content="0; URL=dashboard.php">
<?php } ?> 

<!DOCTYPE html>
<html lang="fr">
    <head>
       <meta charset="utf-8" />
        <title>Légion Network</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
    </head>
    <body id="indexContent">
    <!--[if IE]><?php include("php/alert-ie/alert-ie.php"); ?><![endif]-->
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
      
     <!-- HEADER -->
     <div class="header navbar navbar-inverse navbar-fixed-top">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://legion.verygames.net/">Site internet</a></li>
          <li><a href="http://legion.verygames.net/forum/">Forum</a></li>
        </ul>
        <h3 class="text-muted">Légion Network</h3>
     </div>    

     <!-- CONTENT -->
      <div class="indexContainer container">
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
            <div id="login" class="borderLegion col-md-6">
                <form class="form-signin" action="php/connection/login.php"  method="post">
                    <h2 class="form-signin-heading">Connexion</h2>
                    <input class="form-control" required type="text" name="name" placeholder="Pseudo Minecraft"> <br/>
                    <input class="form-control" required type="password" name="password" placeholder="Mot de passe"> <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
              </form>
              <a href="#" data-toggle="modal" data-target="#modalPasswordLost">Mot de passe oublié ?</a>
            </div>

            <div id="account" class="borderLegion col-md-6">
                <form class="form-signin" action="php/connection/createAccount.php" method="post">
                    <h2 class="form-signin-heading">Création de compte <small>et de candidature</small></h2>
                    <input class="form-control" required type="text" name="name" placeholder="Pseudo Minecraft"> <br/>
                    <input class="form-control" required="" name="email" type="email" placeholder="Adresse Mail"> <br/>
                    <input class="form-control" required type="password" name="password" placeholder="Mot de passe"> <br/>
                    <input class="form-control" required type="password" name="password_again" placeholder="Confirmer mot de passe"> <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
              </form>
            </div>



            <div class="modal fade" id="modalPasswordLost" style="color: #000; font-family: Arial" tabindex="-1" role="dialog" aria-labelledby="modalPasswordLost" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h4 class="modal-title" id="myModalLabel">Réinitaliser votre mot de passe:</h4>
                         </div>
                        <div class="modal-body">
                            <form class="form-signin" action="php/connection/lostPassword.php" method="post">
                                <input class="form-control" required type="text" name="name" placeholder="Pseudo Minecraft"> <br/>
                                <input class="form-control" required="" name="email" type="email" placeholder="Adresse Mail"> <br/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button class="btn btn-success" type="submit">Réinitaliser mot de passe</button>
                             </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
    </body>
</html>