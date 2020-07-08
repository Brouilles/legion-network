<?php include("../BDD.php"); ?>
<?php 

/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */

if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 1 || $_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
{
    $id = $_GET['id'];
    $account_id = $_GET['account_id'];
    $result = $_GET['result'];


        if($result == "accept") //Accept 
        {
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

