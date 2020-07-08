<?php 
$stop = 1;
 $reply = $bdd->query('SELECT * FROM legionCandidacy');
    while($stop != 0 && $data = $reply->fetch())
    {
        if($_SESSION['id'] == $data['poster_id'] && $data['paragraphePresentationMental'] == "" && $data['state'] == 1)
        {
            $stop = 0;
        }
        else
        {
            $stop = 1;
        }
    }

    if($stop == 0)
    {
?>
<style>
	#alert-ie {
		position: fixed;
		top: 80px;
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
		background: #F2DEDE;
		color: black;
		border: 5px solid rgb(238, 211, 215);
		border-radius: 4px;
		padding: 15px;
        height: 460px;
        overflow: auto;
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
		margin-left: 1.8%;
		margin-top: 30px;
		margin-bottom: 30px;
		padding: 17px 20px 15px 70px;
	}

	/**
	 * Bouton de fermeture du message d'alerte
	 */ 

	.link-download button {
		vertical-align: middle;
		width: 168px;
		background: #B94D48;
		color: white;
		font: bold 14px Arial;
		text-align: left;
		border: 0;
		padding: 15px 10px;
		cursor: pointer;
	}

	.link-download button:hover { background: #BE5E58; }

</style>

 <div id="alert-ie">
	            <div>
		            <h2>Mise à jour de candidature.</h2> <br>
		            <p>
			            Suite à une mise à jour du network et à l'ajout de la page des descriptions physiques une mise à jour de candidature est obliger. <br/>
                        Merci de votre compréhension. 
		            </p>
                    <h3>Description actuelle:</h3>
                    <textarea rows="9" class="form-control"><?php echo Stripslashes($data['paragraphePresentation']); ?></textarea> <br/> <br/>
                    <form class="form-signin" action="php/candidacy/postChange.php" method="post">
                        <h3>Description Mentale:</h3>
                        <textarea rows="9" class="form-control" name="paragraphePresentationMental" placeholder="Un paragraphe présentant le mentale de votre personnage."></textarea> <br/>
                        <h3>Description Physique:</h3>
                        <textarea rows="9" class="form-control" name="paragraphePresentation" placeholder="Un paragraphe présentant le physique de votre personnage."></textarea>
                        <textarea style="visibility: hidden;" class="form-control" name="CandidId"><?php echo $data['id']; ?></textarea>
                        <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Poster les modifications</button>
                    </form>
	            </div>
            </div>
<?php } ?>

