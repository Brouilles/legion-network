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
    $commentaire = $_POST['commentaire'];

    $destinataire = $_GET['mail'];
    $message = "Erreur, message Vide.";

    //Date
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    $time = date("H");
    $minutes = date("i");

        if($result == "accept") //Accept
        {
            $message = "Candidature acceptée ! \n
                Bienvenue sur le Serveur Légion ! N'hésite pas à visiter le forum et à faire connaisance avec les autres joueurs. Et si jamais vous avez des questions, n'hésite pas à la poser. \n
                Commentaire du modérateur sur la candidature: \n".$commentaire;

                 $reqaccept = $bdd->prepare('UPDATE legionCharacter SET playable = :playable WHERE account_id = '.$account_id);
                 $reqaccept->execute(array(
                       'playable' => 1
	                    )); 

                 $reqaccept = $bdd->prepare('UPDATE legionCandidacy SET state = :state WHERE id = '.$id);
                 $reqaccept->execute(array(
                       'state' => 1
	                    )); 

                $reqaccept = $bdd->prepare('UPDATE legionCandidacy SET modoTreatment = :modoTreatment WHERE id = '.$id);
                 $reqaccept->execute(array(
                       'modoTreatment' => $_SESSION['user']
	                    )); 

                $reqaccept = $bdd->prepare('UPDATE legionCandidacy SET modoComment = :modoComment WHERE id = '.$id);
                 $reqaccept->execute(array(
                       'modoComment' => $commentaire
	                    )); 

            mail($destinataire, "Titre: Candidature serveur Legion Minecraft", "Envoyer par Légion serveur Minecraft le ".$day."/".$month."/".$year." à ".$time.":".$minutes." \n \n ".$message);
            echo "candidature accepté";
            ?>
                <meta http-equiv="refresh" content="3; URL=../../candidacyList.php">
            <?php
        }
        else if($result == "refuse") //Refuse
        {
            $message = "Candidature refusée.\n
                Commentaire du modérateur sur la candidature: \n".$commentaire;

            $reqaccept = $bdd->prepare('UPDATE legionCharacter SET playable = :playable WHERE account_id = '.$account_id);
                 $reqaccept->execute(array(
                       'playable' => 0
	                    )); 

            $req = $bdd->prepare('UPDATE legionCandidacy SET state = :state WHERE id = '.$id);
            $req->execute(array(
                'state' => -1
	            )); 

            $req = $bdd->prepare('UPDATE legionCandidacy SET modoTreatment = :modoTreatment WHERE id = '.$id);
                 $req->execute(array(
                       'modoTreatment' => $_SESSION['user']
	                    )); 

            $req = $bdd->prepare('UPDATE legionCandidacy SET modoComment = :modoComment WHERE id = '.$id);
                 $req->execute(array(
                       'modoComment' => $commentaire
	                    )); 

             mail($destinataire, "Titre: Candidature serveur Legion Minecraft", "Envoyer par Légion serveur Minecraft le ".$day."/".$month."/".$year." à ".$time.":".$minutes." \n \n ".$message);
             echo "candidature refusé";
             ?>
                <meta http-equiv="refresh" content="3; URL=../../candidacyList.php">
            <?php
        }
        else
        {
            echo "Erreur Fatal, aucune information sur le choix ...";
        }
}
?>

