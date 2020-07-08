<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Mon profil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
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
                <h1>Mon profil:</h1>
                <h3>Information sur le compte:</h3>
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