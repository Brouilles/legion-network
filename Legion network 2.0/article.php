<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Article</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="plugins/bootstrap-datepicker/css/datepicker3.css" />
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
            <div class="borderLegion col-md-12">
               <?php
                  $id = $_GET['id'];
                  $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_article'], $id);
               ?>
                <h1><?php echo Stripslashes($value['title']); ?></h1>
                <?php echo Stripslashes($value['paragraphe']); ?>
            </div>

            <?php include 'include/footer.php'?>
        </div>
    </div>
    <?php include 'plugins/sideBar/sidebar.php' ?>
    </body>
</html>
