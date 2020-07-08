<?php
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
    $id = $_GET['id'];
    $title = $_POST['title'];
    $paragraphe = $_POST['paragraphe'];

    $date = new Datetime('now', new DateTimeZone('Europe/Paris'));

    if(!empty($title) and !empty($paragraphe)) 
    {
        $bdd = AOF_connect();
        $req = $bdd->prepare('UPDATE legionArticle SET title = :title, date = :date, paragraphe = :paragraphe WHERE id = '.$id);
                     $req->execute(array(
	                    'title' => $title,
	                    'date' => $date->format('Y-m-d H:i:s'),
                        'paragraphe' => $paragraphe
	                ));

        echo "Mise à jour de la page effectuer.";
        ?>
            <meta http-equiv="refresh" content="1; URL=../../articleList.php">
        <?php
    }
    else
    {
        echo "Erreur Fatal, Champs non-remplit";
        ?>
            <meta http-equiv="refresh" content="1; URL=../../articleList.php">
        <?php
    }
}
?>

