<?php 
require '../../../aof/conf.php';

AOFInit();
require '../../../aof/header.php';
require '../../../aof/bdd_connect.php';
require '../../../aof/permissions/permissions.php';  

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Bannire</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php
$id = $_GET['id']; 

$bdd = AOF_connect();
$req = $bdd->prepare('UPDATE legionAccount SET rank = :rank WHERE id = '.$id);
    $req->execute(array(
        'rank' => -1
	    )); 

    echo '<p class="bg-success"> Modification effectuer avec succès, Compte bannis. </p>';
    ?>
        <meta http-equiv="refresh" content="1; URL=../../../members.php">
    <?php
?>
    </div>
</body>
</html>
<?php
 }
 else
 {
 ?>
    <meta http-equiv="refresh" content="1; URL=../../../index.php">
<?php
 }
 ?>
