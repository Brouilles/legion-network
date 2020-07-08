 <?php
 setcookie('auth', 'Auth', time() + 3600*24*3); 
 setcookie ("pseudo", "LA GLOBULE", time() + 365*24*3600);
 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Aubega Open Framework - Cookie</title>
    </head>
    <body>
        <h2>Aubega Open Framework - Cookie Debug.</h2>

        <pre>
             setcookie('auth', 'Auth', time() + 3600*24*3); 
             setcookie ("pseudo", "LA GLOBULE", time() + 365*24*3600);
        </pre>

        <p>$_COOKIE Information:</p>
        <pre style="margin-left: 100px;">
            <?php 
            print_r($_COOKIE);
            $array = session_get_cookie_params();
            while (list($key,$val) = each($array)) {
                echo "$key => $val";
             }
            ?>
        </pre>

        <a style="color: #fff; background-color: #00a9ff; padding: 10px 10px 10px 10px;" href="cookie.php">Test cookie. ==></a>

        <footer style="margin-top: 30px;"><a href="http://aubega.com/">Aubega</a>
    </body>
</html>
