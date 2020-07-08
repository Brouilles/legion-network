<?php 
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

require_once('plugins/recaptcha/recaptchalib.php');

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
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
        <link rel="stylesheet" media="screen" type="text/css" href="tabdrop/css/tabdrop.css" />

        <script>
            var RecaptchaOptions = {
                theme : 'white'
            }
        </script>
    </head>
    <body id="indexContent">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE]><?php include("php/alert-ie/alert-ie.php"); ?><![endif]-->
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="Js/tabdrop/js/bootstrap-tabdrop.js"></script>
      
     <!-- HEADER -->
     <?php include'include/header.php'; ?> 

     <!-- CONTENT -->
      <div class="indexContainer container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;"> <img style="width: 90%;" alt="Légion Serveur RP" src="img/logo.png"> </div>
          
            <div class="col-md-8 borderLegion">
                <?php 
                    $value = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_option'], "News", "Name"); 
                    echo Stripslashes($value['Description']);
                ?>
            </div>

            <div class="col-md-4 borderLegion">
                <div class="tabbable ">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Connexion</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Création de compte</a></li>
                  </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div id="login">
                                <form class="form-signin" action="php/connection/login.php"  method="post">
                                    <h2 class="form-signin-heading">Connexion</h2>
                                    <input class="form-control" required type="text" name="name" placeholder="Pseudo Minecraft"> <br/>
                                    <input class="form-control" required type="password" name="password" placeholder="Mot de passe"> <br/>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
                              </form>
                              <a href="#" data-toggle="modal" data-target="#modalPasswordLost">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <div id="account">
                                <form class="form-signin" action="php/connection/createAccount.php" method="post">
                                    <h2 class="form-signin-heading">Création de compte <small>et de candidature</small></h2>
                                    <input class="form-control" required type="text" name="name" placeholder="Pseudo Minecraft"> <br/>
                                    <input class="form-control" required="" name="email" type="email" placeholder="Adresse Mail"> <br/>
                                    <input class="form-control" required type="password" name="password" placeholder="Mot de passe"> <br/>
                                    <input class="form-control" required type="password" name="password_again" placeholder="Confirmer mot de passe"> <br/>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
                                
                                <div class="control" style="margin-top: 6px;">
                                    <?php echo recaptcha_get_html('6LckhfUSAAAAAKsLmMwZWJUxpc2uJC33tc6a4Gnk'); ?>
                                </div>

                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'include/footer.php'; ?>

            <div class="modal fade" id="modalPasswordLost" style="color: #000; font-family: Arial" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
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
    <?php include 'plugins/sideBar/sidebar.php' ?>
    </body>
</html>