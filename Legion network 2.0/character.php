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
        <title>Légion Network - Personnages.</title>
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
                                <th>Ethnie</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_character']);
                            for($i=0;$i < $loop;$i++) 
                            { 
                                //GET INFORMATION
                                $id = $loop - $i;
                                $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $id);

                                if($value['playable'] == 1)
                                {
                                    //TABLE
                                    ?>
                                    <tr>
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo $value['account_id']; ?></td>
                                        <td><?php echo $value['minecraftpseudo']; ?></td>
                                        <td><?php echo $value['CharacterName']; ?></td>
                                        <td><?php if($value['Infecte'] == 1)
                                                    echo "Infecté";
                                                else
                                                    echo "Humain"; ?></td>
                                        <td><?php echo $value['age']; ?></td>
                                    <td><a class="alert alert-danger" href="php/other/characterState.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['account_id'];?>&amp;result=refuse">Mort</a></td>
                                    </tr>
                                <?php
                                }
                            } 
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
                                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_character']);
                                for($i=0;$i < $loop;$i++) 
                                { 
                                    //GET INFORMATION
                                    $id = $loop - $i;
                                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $id);

                                    if($value['playable'] == -1)
                                    {
                                        //TABLE
                                        ?>
                                        <tr>
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo $value['account_id']; ?></td>
                                        <td><?php echo $value['minecraftpseudo']; ?></td>
                                        <td><?php echo $value['CharacterName']; ?></td>
                                        <td><?php if($value['Infecte'] == 1)
                                                    echo "Infecté";
                                                else
                                                    echo "Humain"; ?></td>
                                        <td><?php echo $value['age']; ?></td>
                                        <td><a class="alert alert-success" href="php/other/characterState.php?id=<?php echo $data['id'];?>&amp;account_id=<?php echo $data['account_id'];?>&amp;result=accept">Vivant</a></td>
                                        </tr>
                                <?php
                                    }
                                } 
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
                                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_character']);
                                for($i=0;$i < $loop;$i++) 
                                { 
                                    //GET INFORMATION
                                    $id = $loop - $i;
                                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $id);

                                    if($value['playable'] == 0)
                                    {
                                        //TABLE
                                        ?>
                                        <tr>
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo $value['account_id']; ?></td>
                                        <td><?php echo $value['minecraftpseudo']; ?></td>
                                        <td><?php echo $value['CharacterName']; ?></td>
                                        <td><?php if($value['Infecte'] == 1)
                                                    echo "Infecté";
                                                else
                                                    echo "Humain"; ?></td>
                                        <td><?php echo $value['age']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } 
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