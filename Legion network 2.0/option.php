<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Option du network</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheetAdmin.css" />
    </head>
    <body>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
      
     <!-- HEADER -->
     <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://legion.verygames.net/">Site internet</a></li>
          <li><a href="http://legion.verygames.net/forum/">Forum</a></li>
          <li><a href="http://legion.verygames.net/">|</a></li>
          <li><a href="dashboard.php"><?php echo $_SESSION['user'];?></a></li>
          <li><a href="php/connection/disconnect.php">Déconnexion</a></li>
        </ul>
        <h3 class="text-muted">Légion Network</h3>
     </div>    

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="col-md-12 content">
              <h1>Général:</h1>
                <div class="col-md-12">
                    <div class="col-md-4" id="uploadSkin">
                        <form class="form-signin" enctype="multipart/form-data" action="php/option/background.php" method="post">
                            <h2><small style="color: #fff;">Image de fond du site:</small></h2>
                            <a href="http://yourphotodropper.aubega.com/"> <img style="width: 300px;" alt="YourPhotoDropper" src="http://yourphotodropper.aubega.com/img/YouPhotoDropper.png" > </a><br/>
                            <input type="file" name="skinFile" id="skin" required style="display: inline-block;">
                            <p>Image au format: .jpg uniquement. De préférence 1920*1018 px.</p>
                            <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Mettre en ligne</button>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <a href="#" data-toggle="modal" data-target="#addPageModal"><span class="glyphicon glyphicon-plus"></span> Modifier la page principal</a>
                    </div>
                </div>

                
             <div class="modal fade" id="addPageModal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modifier page principal:</h4>
                  </div>
                  <div class="modal-body">
                    <?php $value = AOF_compareValueAndGetTableValue($GLOBALS['AOF_BDD_TABLE_option'], "News", "Name"); ?>
                    <form class="form-signin" action="php/option/postNews.php" method="post">
                        <textarea style="height: 460px;" class="textbox" name="paragraphe" rows="20"><?php echo Stripslashes($value['Description']); ?></textarea> <br/>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>

            <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
                                <script type="text/javascript">
                                tinymce.init({
                                        selector: ".textbox",
                                        plugins: [
                                                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                                                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
                                        ],

                                        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                                        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
                                        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

                                        menubar: false,
                                        toolbar_items_size: 'small',

                                        style_formats: [
                                                {title: 'Bold text', inline: 'b'},
                                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                                {title: 'Table styles'},
                                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                                        ],

                                        templates: [
                                                {title: 'Test template 1', content: 'Test 1'},
                                                {title: 'Test template 2', content: 'Test 2'}
                                        ]
                                });</script>
            </div>
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