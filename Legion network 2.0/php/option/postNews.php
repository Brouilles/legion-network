<?php
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
    $paragraphe = $_POST['paragraphe'];

    if(!empty($paragraphe)) 
    {
        $bdd = AOF_connect();
        $req = $bdd->prepare('UPDATE legionOption SET Description = :Description WHERE id = 2');
                     $req->execute(array(
	                    'Description' => $paragraphe
	                ));

        echo "Mise à jour de la page effectuer.";
        ?>
            <meta http-equiv="refresh" content="1; URL=../../option.php">
        <?php
    }
    else
    {
        echo "Erreur Fatal, Champs non-remplit";
        ?>
            <meta http-equiv="refresh" content="1; URL=../../option.php">
        <?php
    }
}
?>

