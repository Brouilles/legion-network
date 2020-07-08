<?php 
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  

require '../other/crypte.php';

require_once('../../plugins/recaptcha/recaptchalib.php');
 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Création de compte</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<style>

	/**
	 * Conteneur qui sera supprimé au clic sur le bouton 'fermé'
	 */

	#alert-ie {
		position: fixed;
		top: 20%;
		left: 50%;
		 z-index: 99999;
	}

	/**
	 * 1. Centre la div enfant avec une position: fixed;
	 * 2. Ajout d'une largeur minimal pour éviter le retour à la ligne du lien 'Google Chrome'
	 */

	#alert-ie > div {
		position: relative; /* 1 */
		left: -50%; /* 1 */
		min-width: 800px; /* 2 */
		background-color: #228800;
		color: black;
		border: 5px solid rgb(238, 211, 215);
		border-radius: 4px;
		padding: 15px;
	}

	/**
	 * 1. Enlève le float: left; des titres 2
	 * 2. Enlève toutes les marges des titres 2
	 */

	#alert-ie h2 {
		font-size: 20px;
		float: none; /* 1 */
		margin: 0; /* 2 */
	}

	#alert-ie a {
		vertical-align: middle;
		text-decoration: none;
		color: black;
	}

	#alert-ie a:hover { text-decoration: underline; }

	/**
	 * Conteneur du bouton et des liens de téléchargements
	 */ 

	.link-download {
		text-align: center;
		margin-top: 10px;
	}

	/**
	 * Lien de téléchargement Mozilla et G. Chrome
	 */

	.link-download a {
		display: inline-block;
		background-color: white;
		background-repeat: no-repeat;
		background-position: 20px center;
		text-align: left;
		margin-top: 30px;
		margin-bottom: 30px;
		padding: 17px 20px 15px 70px;
	}
</style>
<?php
$name = $_POST['name']; 
$minName = strtolower($name);
$maxName = strtoupper($name);

$password = $_POST['password'];
$password_again = $_POST['password_again'];

$email = $_POST['email'];
$minEmail = strtolower($email);

$recaptcha = recaptcha_check_answer('6LckhfUSAAAAAA6VmMDxT2IF6-CHWwEicIzAZZH9', $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

$stop = 0;

//Date
$date = new Datetime('now', new DateTimeZone('Europe/Paris'));

if($recaptcha->is_valid && !empty($password) and !empty($name) and !empty($email))
{
    if($password ==  $password_again) 
    {
            $bdd = AOF_connect();
            $reply = $bdd->query('SELECT * FROM legionAccount');
            while($data = $reply->fetch())
            {
                if($minName == strtolower($data['minecraftpseudo']) || $maxName== strtoupper($data['minecraftpseudo']) || $minEmail == $data['email'])
                {
                   $stop = 1;
                }
            }

            if($stop == 0)
            {
               $password = crypter($password);
               $req = $bdd->prepare('INSERT INTO legionAccount(minecraftpseudo, password, email, created, lastlogin) VALUES(:minecraftpseudo,:password,:email,:created,:lastlogin)');
                     $req->execute(array(
	                    'minecraftpseudo' => $name,
	                    'password' => $password,
	                    'email' => $minEmail,
                        'created' => $date->format('Y-m-d H:i:s'),
                        'lastlogin' => $date->format('Y-m-d H:i:s')
	                ));
                    $reply->closeCursor();

                    $stop1 = 1;
                    $reply = $bdd->query('SELECT * FROM legionAccount');
                    while($stop1 != 0 && $data = $reply->fetch())
                    {
                        if($name == $data['minecraftpseudo'] && $password == $data['password'])
                        {
                           $stop1 = 0;
                        }
                        else
                        {
                            $stop1 = 1;
                        }
                    }
           
                    if($stop == 0)
                    {
                         $req = $bdd->prepare('UPDATE legionAccount SET lastlogin = :lastlogin');
                         $req->execute(array(
                               'lastlogin' => $date->format('Y-m-d H:i:s')
	                            ));

                         $_SESSION['id'] = $data['id'];
                         $_SESSION['email'] = $data['email'];
                         $_SESSION['user'] = $data['minecraftpseudo'];
                         $_SESSION['rank'] = $data['rank'];
                         $_SESSION['connect'] = 1;

                         $reply->closeCursor();

                    echo '<p class="bg-success"> Compte enregistrer ! </p>';
                 ?>
                <div id="alert-ie">
	                <div>
		                <h2>Que voulez-vous faire ?</h2> <br>
		                <p>
			                Votre compte est maintenant activé et accessible, il ne vous reste plus qu'a créé une candidature.<br/>
                            Voulez-vous écrire votre candidature maintenant ? 
		                </p>
		                <div class="link-download">
			                <a href="../../dashboard.php">Plus Tard...</a>
			                <a href="../../candidacy.php">Maintenant</a>
		                </div> <!-- /end .link-download -->
	                </div>
                </div>
                 
          <?php    }
            }
            else
            {
                echo '<p class="bg-danger">Nom de compte ou adresse mail déja utiliser.</p>';
                ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
            }
        }
        else
        {
            echo '<p class="bg-danger"> erreur, mot de passe non identique. </p>';
            ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
        }
}
else
{
    echo '<p class="bg-danger"> Certains champs ne sont pas remplit  </p>';
    ?>
                   <meta http-equiv="refresh" content="2; URL=../../index.php">
                <?php
}
?>
    </div>
</body>
</html>