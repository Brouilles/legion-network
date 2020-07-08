<?php include("php/BDD.php"); ?>
<?php
    
/* début de utf-8 */
ini_set('default_charset', 'UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
/* fin de utf-8 */
 
if($_SESSION['connect'] == 0 || $_SESSION['connect'] == 1)
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Calendrier d'évenement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
        <script src="minecraft_skin.js" type="text/javascript"></script>
    </head>
    <body id="indexContent">
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
      
     <!-- HEADER -->
     <?php include'include/header.php'; ?>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <h1>Calendrier:</h1>
            <?php
                require('php/calendarDate.php');
                $calendar = new Calendar();
                $year = date('Y');
                $dates = $calendar->getAll($year);
            ?>

            <div class="col-md-12">
                <p>Mode graphique:</p>
                <h1> <?php echo $year; ?></h1>
                <ul>
                    <?php foreach ($calendar->months as $m): ?>
                        <li><?php echo $m; ?></li>
                    <?php endforeach; ?>
                </ul>

                <ul>
                    <?php foreach ($calendar->days as $m): ?>
                        <li><?php echo $m; ?></li>
                    <?php endforeach; ?>
                </ul>

                <p>Mode Dev:</p>
                <pre><?php print_r($dates); ?></pre>
            </div>

            <?php include 'include/adminPanel.php'?>
            <?php include 'include/footer.php'?>
        </div>
    </div>
    </body>
</html>
<?php
 }
 else
 {
 ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
<?php
 }
 ?>