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
        <title>Légion Network - Personnage description physique</title>
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
            <div class="borderLegion col-md-12">
                <h1>Personnages, description physique:</h1>
                <?php
                //Character Information 
                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_character']);
                for($i=0;$i < $loop;$i++) 
                { 
                    //GET INFORMATION
                    $id = $loop - $i;
                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $id);

                    if($value['playable'] == 1)
                    { ?>
                        <div class="col-md-3 minecraft_head" style="text-align: center;" id="<?php echo $value['minecraftpseudo']; ?>">
                            <a data-toggle="modal" data-target="<?php echo "#modal".$value['account_id']; ?>">
                                <canvas class="hat" id="<?php echo $value['minecraftpseudo']."_hat"; ?>"></canvas>
                                <script type="text/javascript">
                                    draw_hat('<?php echo $value['minecraftpseudo']."_hat"; ?>','<?php echo $value['minecraftpseudo']; ?>', 15);
                                </script>
                                <h4><?php echo $value['CharacterName']; ?></h4>
                            </a>
                         </div>
                    <?php
                        $candidacyValue = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $value['minecraftpseudo'], "minecraftpseudo", 1, "state");
                        ?>
                        <div class="modal fade" id="modal<?php echo $value['account_id']; ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Fiche de <?php echo $candidacyValue['name']." ". $candidacyValue['firstName'];  ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <strong>Description physique:</strong> <br/>
                                        <?php echo Stripslashes($candidacyValue['paragraphePresentation']); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                             </div>
                         </div>
                        <?php
                    }
                } 

                //Candidacy Information
               /* for($i=0;$i < AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']);$i++) 
                { 
                    //GET INFORMATION
                    $id = $loop - $i;
                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $id);
                ?>
                <div class="modal fade" id="modal<?php echo $value['poster_id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Fiche de <?php echo $value['name']." ". $value['firstName'];  ?></h4>
                            </div>
                            <div class="modal-body">
                                <strong>Description physique:</strong> <br/>
                                <?php echo Stripslashes($value['paragraphePresentation']); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                     </div>
                 </div>
                <?php
                }*/
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