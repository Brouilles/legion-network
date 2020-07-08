<?php
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
    $title = $_POST['title'];
    $paragraphe = $_POST['paragraphe'];

    $date = new Datetime('now', new DateTimeZone('Europe/Paris'));

    if(!empty($title) and !empty($paragraphe)) 
    {
        $bdd = AOF_connect();
        $req = $bdd->prepare('INSERT INTO legionArticle(title, author, date, paragraphe) VALUES(:title,:author,:date,:paragraphe)');
                     $req->execute(array(
	                    'title' => $title,
	                    'author' => $_SESSION['user'],
	                    'date' => $date->format('Y-m-d H:i:s'),
                        'paragraphe' => $paragraphe
	                ));

        echo "La page existe maintenant.";
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

