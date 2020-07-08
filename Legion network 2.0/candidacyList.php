<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

require 'php/candidacy/candidacyWindow.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Candidature en attente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheetAdmin.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="tabdrop/css/tabdrop.css" />
    </head>
    <body>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="Js/tabdrop/js/bootstrap-tabdrop.js"></script>
      
     <!-- HEADER -->
     <?php include 'include/adminHeader.php'; ?>  

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="col-md-12 content">
                <div class="tabbable ">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Candidature en attente</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Candidature accepté</a></li>
                    <li><a href="#tab3" data-toggle="tab">Candidature refusé</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <table class="table"> <!-- EN ATTENTE -->
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>Id de compte</th>
                          <th>Nom de compte</th>
                          <th>Date de la demande</th>
                          <th>Nom du personnage RP</th>
                          <th>En détaille...</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            for($i=1;$i <= AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']);$i++) 
                            { 
                                $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $i);

                                if($value['state'] == 0)
                                {
                                    echo "<tr>";
                                    echo "<td>".$value['id']."</td>";
                                    echo "<td>".$value['poster_id']."</td>";
                                    echo "<td>".$value['minecraftpseudo']."</td>";
                                    echo "<td>".$value['date']."</td>";
                                    echo "<td>".$value['name']."</td>";
                                    echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$value['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                    echo "</tr>";
                                }
                            } 
                        ?>
                      </tbody>
                    </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <table class="table"> <!-- ACCEPTE -->
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>Id de compte</th>
                              <th>Nom de compte</th>
                              <th>Date de la demande</th>
                              <th>Nom du personnage RP</th>
                              <th>Modération</th>
                              <th>En détaille...</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']);
                                for($i=0;$i <= $loop;$i++) 
                                { 
                                    //GET INFORMATION
                                    $id = $loop - $i;
                                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $id);

                                    if($value['state'] == 1)
                                        {
                                            echo "<tr class='success'>";
                                            echo "<td>".$value['id']."</td>";
                                            echo "<td>".$value['poster_id']."</td>";
                                            echo "<td>".$value['minecraftpseudo']."</td>";
                                            echo "<td>".$value['date']."</td>";
                                            echo "<td>".$value['name']."</td>";
                                            echo "<td>".$value['modoTreatment']."</td>";
                                            echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$value['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                            echo "</tr>";
                                        }
                                } 
                            ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab3">
                      <table class="table"> <!-- REFUSE -->
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>Id de compte</th>
                              <th>Nom de compte</th>
                              <th>Date de la demande</th>
                              <th>Nom du personnage RP</th>
                              <th>Modération</th>
                              <th>En détaille...</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']);
                                for($i=0;$i <= $loop;$i++) 
                                { 
                                    //GET INFORMATION
                                    $id = $loop - $i;
                                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $id);

                                    if($value['state'] == -1)
                                        {
                                            echo "<tr class='danger'>";
                                            echo "<td>".$value['id']."</td>";
                                            echo "<td>".$value['poster_id']."</td>";
                                            echo "<td>".$value['minecraftpseudo']."</td>";
                                            echo "<td>".$value['date']."</td>";
                                            echo "<td>".$value['name']."</td>";
                                            echo "<td>".$value['modoTreatment']."</td>";
                                            echo '<td>  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal'.$value['id'].'"> <span class="glyphicon glyphicon-plus"></span> </button> </td>';
                                            echo "</tr>";
                                        }
                                } 
                            ?>
                          </tbody>
                     </table>
                    </div>
                  </div>
                </div>
                <?php 
                    for($i=1;$i <= AOF_count($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy']); $i++) 
                    { 
                        $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $i);
                        candidacyWindow($i, true);
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