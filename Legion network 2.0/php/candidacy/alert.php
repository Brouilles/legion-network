<?php
/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */
?>
<style>
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
		background: #F2DEDE;
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
		            <h2>Que voulez-vous faire ?</h2> <br>
		            <p>
			            Attention, votre personnage actuel sera supprimer, vous ne pourrez donc pas le récuperer. <br/>
                        Pour plus d'information contacter un admin et appuyer sur "Plus Tard...". 
		            </p>
		            <div class="link-download">
			            <a href="../../dashboard.php">Plus Tard...</a>
			            <a href="../../candidacy.php">Continuer</a>
		            </div> <!-- /end .link-download -->
	            </div>
            </div>

