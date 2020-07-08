<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php'; 
require 'aof/permissions/permissions.php';

require 'php/candidacy/candidacyWindow.php';

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
        <script src="plugins/minecraftSkin/minecraft_skin.js" type="text/javascript"></script>
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
                //include 'php/candidacy/changeParagraphe.php';
                $candidacyNumber = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']);
                $candidacyNumberAttente = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], "state", 0);
                $account = AOF_count($GLOBALS['AOF_BDD_TABLE_account']);
            ?>
            <div class="alert alert-info col-md-12">Actuellement <? echo $candidacyNumber; ?> candidatures dont <?php echo $candidacyNumberAttente; ?> en attentes, <?php echo $account; ?> inscrits.</div>
            
            <!-- HEADER -->
            <div class="borderLegion col-md-8"> 
                <?php include 'include/carousel.php'; ?>
            </div>

            <div class="borderLegion col-md-4" style="float: right;"> 
                <h1>Personnage:</h1>
                <?php
                if(AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $_SESSION['id'], "account_id", 1, "playable"))
                {
                    //Actual character
                    $value = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $_SESSION['id'], "poster_id", 1, "state");
                    ?>
                        <div id="playerInfo">
                            <div class="minecraft_model" id="<?php echo $value['minecraftpseudo']; ?>">
                                <canvas class="scratch" id="<?php echo $value['minecraftpseudo']; ?>_scratch"></canvas><canvas class="model" id="<?php echo $value['minecraftpseudo']; ?>_model"></canvas>
                                <script type="text/javascript">
                                    draw_model('<?php echo $value['minecraftpseudo']; ?>_model','<?php echo $value['minecraftpseudo']; ?>_scratch','<?php echo $value['minecraftpseudo']; ?>',6,true);
                                </script>
                            </div> 

                            <div style="text-align: center; margin-bottom: 10px;">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalTexture"> <span class="glyphicon glyphicon-plus"></span> Changer de Skin </button>
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"> <span class="glyphicon glyphicon-resize-full"></span> </button>
                            </div>

                            <ul>
                                <li>Nom: <?php echo $value['name']; ?></li>
                                <li>Prénom: <?php echo $value['firstName']; ?></li>
                                <li>Age: <?php echo $value['age']." ans"; ?></li>
                                <li>Ethnie: <?php if($value['ethnie'] == 1)
                                                    echo "Infecté";
                                                else
                                                    echo "Humain"; ?></li>
                            </ul>
                            <!-- CANDIDACY -->
                            <?php candidacyWindow($value['id'], false); ?>

                            <!-- SKIN UPLOAD -->
                            <div class="modal fade" id="modalTexture" style="color: #000; font-family: Arial" tabindex="-1" role="dialog">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Changement de skin: <?php echo $value['minecraftpseudo']; ?></h4>
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
                        </div>

                        <div style="margin-top: 30px;">
                            <h4>Historique des personnages:</h4>
                            <table class="table">
                                     <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Ethnie</th>
                                            <th>Age</th>
                                            <th>Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //History
                                        $loop = 0;
                                        $list = AOF_countGetID($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $_SESSION['id'], "poster_id");
                                        for($i=0;$i < AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], "poster_id", $_SESSION['id']); $i++)
                                        {
                                            $value = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $list[$i], "id", 1, "state");
                                            ?>
                                                    <tr>
                                                        <th><?php echo $value['name']." ".$value['firstName']; ?></th>
                                                        <th><?php if($value['ethnie'] == 1)
                                                                    echo "Infecté";
                                                                else
                                                                    echo "Humain"; ?></th>
                                                        <th><?php echo $value['age']; ?></th>
                                                        <th><button class="btn btn-primary" style="width: 100%;" data-toggle="modal" data-target="#modal<?php echo $value['id'];?>"> <span class="glyphicon glyphicon-resize-full"></span></button></th>
                                                    </tr>

                                            <?php
                                            //Load CANDIDACY
                                            candidacyWindow($value['id'], false, true); 
                                        }
                                        ?>
                                     </tbody>
                              </table>
                        </div>
                        <p class="bg-danger"><a href="php/candidacy/alert.php">Nouvelle Candidature.</a> Attention, votre personnage actuel sera remplacé par le nouveau !</p>       
                    <?php
                }
                else
                {
                ?>
                    <p class="bg-danger">Vous n'avez pas de personnage sur le serveur. <a href="candidacy.php">Faite une candidature !</a></p>
                <?php
                }
                ?>
            </div>

            <div class="borderLegion col-md-4"> News RP </div>
            <div class="borderLegion col-md-4"> News HRP </div>

            <div class="col-md-12"> <?php include 'include/adminPanel.php'?> </div>
            <?php include 'include/footer.php'?>
        </div>
    </div>
    <?php include 'plugins/sideBar/sidebar.php' ?>
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