<p>Valeur des COOKIE:</p>
<?php 
                    if (isset($_COOKIE["auth"])) 
                        echo $_COOKIE['auth'];
                    else
                        echo "Erreur: Pas de cookie"; ?>

                    <br/>
                    <?php 
                    if (isset($_COOKIE["pseudo"])) 
                        echo $_COOKIE['pseudo'];
                    else
                        echo "Erreur: Pas de cookie"; ?>


<p>Information sur $_COOKIE:</p>
<pre>
            <?php 
            print_r($_COOKIE);
            $array = session_get_cookie_params();
            while (list($key,$val) = each($array)) {
                echo "$key => $val";
             }
            ?>
        </pre>

<a style="color: #fff; background-color: #00a9ff; padding: 10px 10px 10px 10px;" href="index.php">Retour. ==></a>

        <footer style="margin-top: 30px;"><a href="http://aubega.com/">Aubega</a> | <a href="http://legion.verygames.net/">Legion</a></footer>