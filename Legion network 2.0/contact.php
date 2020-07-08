<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/getTable.php';
require 'aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

      <meta charset="utf-8" />
        <title>Légion Network - Contactez-nous</title>
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
     <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
     <script src="plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>

     <!-- HEADER -->
     <?php include'include/header.php'; ?>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="borderLegion col-md-12">
               <h1>Contactez-nous | Ticket</h1>
               <form class="form-signin" action="#" method="post">
                   <div class="col-md-6">
                      <select class="form-control" onchange="getval(this);">
                            <option value="1">Je rencontre un problème en jeu</option>
                            <option value="2">Je rencontre un problème sur le site internet</option>
                            <option value="3">Je vais être absent</option>
                            <option value="4">Recrutement</option>
                      </select>
                       <br/>

                       <div id="sandbox-container">
                           <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" />
                                <span class="input-group-addon">jusqu'au</span>
                                <input type="text" class="input-sm form-control" name="end" />
                           </div>
                       </div>

                       <script type="text/javascript">
                        $('#sandbox-container .input-daterange').datepicker({
                            language: "fr"
                        });

                        $("#sandbox-container").hide();
                        function getval(sel) {
                              if(sel.value == "3") {
                                  $("#sandbox-container").show();
                              }
                              else {
                                  $("#sandbox-container").hide();
                              }
                        }
                    </script>
                   </div>

                   <div class="col-md-6">
                        <p>
                            Assurez-vous de nous fournir un maximum de détails concernant votre problème (description, lieu, type de problème). Il nous sera alors bien plus facile de vous aidez.
                        </p>
                   </div>

                   <div class="col-md-12" style="margin-top: 60px;"> 
                       <h3>Expliquer votre problème en quelques lignes:</h3>
                       <textarea id="text" class="form-control" rows="20" name="paragrapheRP" placeholder="Votre problème."></textarea>
                       <br/> 
                       <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Envoyer une requête</button>
                   </div>
               </form>

               <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
                                <script type="text/javascript">
                                tinymce.init({
                                        selector: "#text",
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