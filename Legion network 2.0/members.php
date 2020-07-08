<?php 
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
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
     <?php include 'include/adminHeader.php'; ?>    

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
                    $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_account']);
                    for($i=0;$i < $loop;$i++) 
                    { 
                        //GET INFORMATION
                        $id = $loop - $i;
                        $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_account'], $id);

                        if($value['rank'] == 0 || $value['rank'] == 1) {
                            echo "<tr class='success'>";
                        }
                        elseif($value['rank'] == -1) {
                            echo "<tr class='danger'>";
                        }
                        else {
                            echo "<tr>";
                        }

                        //TABLE
                        echo "<td>".$value['id']."</td>";
                        echo "<td>".$value['minecraftpseudo']."</td>";
                        echo "<td>".$value['email']."</td>";
                        echo "<td>".$value['created']."</td>";
                        echo "<td>".$value['lastlogin']."</td>";
                        echo "<td>".$value['rank']."</td>"; 
                        if($value['rank'] == 0 || $value['rank'] == -1)
                            echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$value['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                        echo "</tr>";
                    } 
                    ?>
                  </tbody>
                </table>

                <!--BOX ACTION-->
                <?php
                for($i=0;$i < AOF_count($GLOBALS['AOF_BDD_TABLE_account']);$i++) 
                { 
                    //GET INFORMATION
                    $id = $loop - $i;
                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_account'], $id);

                    if($value['rank'] == 0 || $value['rank'] == -1)
                    {
                    ?>
                    <div class="modal fade" id="modal<?php echo $value['id']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Compte de <?php echo $value['minecraftpseudo'];?></h4>
                                </div>
                                <div class="modal-body">
                                    <h2>Actions disponibles:</h2>
                                    <?php
                                    if($value['rank'] == 0)
                                    {
                                    ?>
                                        <a class="alert alert-danger" href="php/connection/action/ban.php?id=<?php echo $value['id'];?>">Bannir le compte</a>
                                    <?php
                                    }
                                    elseif($value['rank'] == -1)
                                    {
                                    ?>
                                        <a class="alert alert-success" href="php/connection/action/deban.php?id=<?php echo $value['id'];?>">Dé-Bannir le compte</a>
                                    <?php
                                    }
                                    ?>
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