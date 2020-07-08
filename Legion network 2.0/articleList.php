<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

require 'php/candidacy/candidacyWindow.php';

if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Liste des Articles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheetAdmin.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="tabdrop/css/tabdrop.css" />
    </head>
    <body>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="Js/tabdrop/js/bootstrap-tabdrop.js"></script>
      
     <!-- HEADER -->
     <?php include 'include/adminHeader.php'; ?>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="col-md-12 content">
                <a href="#" data-toggle="modal" data-target="#addPageModal"><span class="glyphicon glyphicon-plus"></span> Ajouter une page</a>
                <table class="table">
                    <thead>
                        <tr>
                          <th>#id</th>
                          <th>Titre de la page</th>
                          <th>Autheur</th>
                          <th>Date de publication</th>
                          <th>Voir la page</th>
                          <th>Modifier</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php 
                             $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_article']);
                             for($i=1;$i <= $loop-1;$i++) 
                             { 
                                //GET INFORMATION
                                $id = $loop - $i;
                                $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_article'], $id);
                            ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['title']; ?></td>
                                    <td><?php echo $value['author']; ?></td>
                                    <td><?php echo $value['date']; ?></td>
                                    <td><a href="<?php echo "article.php?id=".$value['id']; ?>">Lien</a></td>
                                    <td><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"> <span class="glyphicon glyphicon-plus"></span> </button></td> 
                                </tr>  
                            <?php
                             }                            
                            ?>
                      </tbody>
                </table>

                <?php 
                $loop = AOF_count($GLOBALS['AOF_BDD_TABLE_article']);
                for($i=1;$i <= $loop-1;$i++) 
                { 
                    //GET INFORMATION
                    $id = $loop - $i;
                    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_article'], $id);
                 ?>
                 <div class="modal fade" id="modal<?php echo $value['id']; ?>" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modifier une page:</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-signin" action="php/article/updateArticle.php?id=<?php echo $value['id']; ?>" method="post">
                            <input style="width: 260px;" class="form-control" required type="text" value= "<?php echo Stripslashes($value['title']); ?>" name="title" placeholder="Titre de la page" /><br/>
                            <textarea style="height: 460px;" class="textbox" name="paragraphe" rows="20"><?php echo Stripslashes($value['paragraphe']); ?></textarea> <br/>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                      </div>
                    </div>
                  </div>
                </div>
                 <?php
                 }                            
                 ?>

             <div class="modal fade" id="addPageModal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter une page:</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-signin" action="php/article/postArticle.php" method="post">
                        <input style="width: 260px;" class="form-control" required type="text" name="title" placeholder="Titre de la page"> <br/>
                        <textarea style="height: 460px;" class="textbox" name="paragraphe" rows="20"></textarea> <br/>
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