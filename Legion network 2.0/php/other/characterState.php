<?php 
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
    $id = $_GET['id'];
    $account_id = $_GET['account_id'];
    $result = $_GET['result'];


        if($result == "accept") //Accept 
        {
            $bdd = AOF_connect();
            $reqaccept = $bdd->prepare('UPDATE legionCharacter SET playable = :playable WHERE id = '.$id);
                 $reqaccept->execute(array(
                       'playable' => 1
	                    )); 

            echo "Personnage maintenant vivant";
            ?>
                <meta http-equiv="refresh" content="3; URL=../../character.php">
            <?php
        }
        else if($result == "refuse") //DEAD
        {
            $bdd = AOF_connect();
            $reqaccept = $bdd->prepare('UPDATE legionCharacter SET playable = :playable WHERE id = '.$id);
                 $reqaccept->execute(array(
                       'playable' => -1
	                    )); 

             echo "Personnage maintenant mort";
             ?>
                <meta http-equiv="refresh" content="3; URL=../../character.php">
            <?php
        }
        else
        {
            echo "Erreur Fatal, aucune information sur le choix ...";
        }
}
?>

