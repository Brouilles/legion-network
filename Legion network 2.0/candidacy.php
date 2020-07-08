<?php
require 'aof/conf.php';

AOFInit();
require 'aof/header.php';
require 'aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8" />
        <title>Légion Network - Candidature</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" media="screen" type="text/css" href="css/StyleSheet.css" />

        <Script>
        function desactiveEnter(){
            if (event.keyCode == 13) {
                 event.keyCode = 0;
                 window.event.returnValue = false;
            }
        }
        </Script>

    </head>
    <body id="indexContent" onKeyDown='desactiveEnter()'>
     <!--JQuery link-->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="Js/candidacy.js"> </script>
      
     <!-- HEADER -->
     <?php include'include/header.php'; ?>   

     <!-- CONTENT -->
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="borderLegion" style="font-size: 26px;">Guide de candidature <a href="http://legion.verygames.net/guide-de-la-candidature/">ici</a>.</p>
                <p class="alert alert-danger" style="font-size: 26px;">Rappel: Cette page a pour but de poster votre candidature dans l'immédiat et non de l'écrire directement.</a></p>
                <form class="form-signin" enctype="multipart/form-data" action="php/candidacy/postCandidacy.php" method="post">
                
                <div class="borderLegion">
                    <h2>Présentez-vous:</h2>
                    <textarea class="form-control" rows="20" required name="paragrapheIRL" placeholder="Un paragraphe vous présentant. (IRL)"></textarea>
                </div>

                <div class="borderLegion" style="height: 600px;">
                    <h2>Personnage RP:</h2>
                            <div class="col-md-6">
                                <h2><small>Général</small></h2>
                                <input class="form-control" required type="text" name="firstName" id="firstName" placeholder="Prénom"><br/>
                                <input class="form-control" required type="text" name="name" placeholder="Nom"><br/>
                                <input class="form-control" required type="text" name="age" maxlength="2" id="age" placeholder="âge"><br/>
                                <select class="form-control"  required name="ethnie">
                                  <option value="0">Humain</option>
                                  <option value="1">Infecté</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <h2><small>Présentation dans un paragraphe:</small></h2>
                                <textarea class="form-control" id="paragraphePresentation" name="paragraphePresentation" rows="9" placeholder="Un paragraphe présentant le physique de votre personnage."></textarea>
                            </div>
                            <div class="col-md-12" style="height: 20px;"> </div>
                            <div class="col-md-12">
                                <textarea class="form-control" id="paragraphePresentationMental" name="paragraphePresentationMental" rows="9" placeholder="Un paragraphe présentant le mental de votre personnage."></textarea>
                            </div>
                </div>

                <div class="borderLegion" style="text-align: center;">
                    <h2><small style="color: #fff;">Skin</small></h2>
                    <a href="http://yourphotodropper.aubega.com/"> <img style="width: 300px;" alt="YourPhotoDropper" src="http://yourphotodropper.aubega.com/img/YouPhotoDropper.png" > </a><br/>
                    <input type="file" name="skinFile" id="skin" required style="display: inline-block;">
                    <p>Image au format: .png uniquement !</p>
                </div>

                        <div class="borderLegion" id="CandidacyComp">
                           <h2>Compétence:</h2>
                            <div class="col-md-12"><span class="col-md-1 label label-danger">Bêta</span> <p class="col-md-11">Points à attribuer: <span id="point" class="badge"></span></p></div>
                            <h3 class="col-md-12">Récolte</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Palier 1</th>
                                  <th>Palier 2</th>
                                  <th>Palier 3</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><input type="checkbox" id="Maitrise_du_Bucheronnage_niveau_1" name="Maitrise_du_Bucheronnage_niveau_1" value="1"> Maitrise du Bucheronnage niveau 1 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_du_Bucheronnage_niveau_2" name="Maitrise_du_Bucheronnage_niveau_2" value="1"> Maitrise du Bucheronnage niveau 2 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_du_Bucheronnage_niveau_3" name="Maitrise_du_Bucheronnage_niveau_3" value="1"> Maitrise du Bucheronnage niveau 3 </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Maitrise_du_Minage_niveau_1" name="Maitrise_du_Minage_niveau_1" value="1"> Maitrise du Minage niveau 1 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_du_Minage_niveau_2" name="Maitrise_du_Minage_niveau_2" value="1"> Maitrise du Minage niveau 2 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_du_Minage_niveau_3" name="Maitrise_du_Minage_niveau_3" value="1"> Maitrise du Minage niveau 3 </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Maitrise_de_Excavation_Pierre_niveau_1" name="Maitrise_de_Excavation_Pierre_niveau_1" value="1"> Maitrise de l'Excavation de la Pierre niveau 1 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_de_Excavation_Pierre_niveau_2" name="Maitrise_de_Excavation_Pierre_niveau_2" value="1"> Maitrise de l'Excavation de la Pierre niveau 2 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitrise_de_Excavation_Pierre_niveau_3" name="Maitrise_de_Excavation_Pierre_niveau_3" value="1"> Maitrise de l'Excavation de la Pierre niveau 3 </label> </td>
                                  </tr>
                              </tbody>
                            </table>
                            <h3>Alimentaire</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Palier 1</th>
                                  <th>Palier 2</th>
                                  <th>Palier 3</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><input type="checkbox" id="Cuistot" name="Cuistot" value="1"> Cuistot </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Cuisinier" name="Cuisinier" value="1"> Cuisinier </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Cuisinier" name="Maitre_Cuisinier" value="1"> Maitre Cuisinier </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Patisserie" name="Initiation_Patisserie" value="1"> Initiation Patisserie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Patissier" name="Patissier" value="1"> Patissier </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Patissier" name="Maitre_Patissier" value="1"> Maitre Patissier </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Boulangerie" name="Initiation_Boulangerie" value="1"> Initiation Boulangerie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Boulanger" name="Boulanger" value="1"> Boulanger </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Boulanger" name="Maitre_Boulanger" value="1"> Maitre Boulanger </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Boucherie_Charcuterie" name="Boucherie_Charcuterie" value="1"> Boucherie et Charcuterie </label> </td>
                                  </tr>
                              </tbody>
                            </table>
                            <h3>Artisanat</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Palier 1</th>
                                  <th>Palier 2</th>
                                  <th>Palier 3</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Tannerie" name="Initiation_Tannerie" value="1"> Initiation Tannerie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Tannerie" name="Tannerie" value="1"> Tannerie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_en_Tannerie" name="Maitre_en_Tannerie" value="1"> Maitre en Tannerie </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Artisanat_Initiation_Archerie" name="Artisanat_Initiation_Archerie" value="1"> Initiation Archerie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Artisanat_Archerie" name="Artisanat_Archerie" value="1"> Archerie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Artisanat_Maitre_en_Archerie" name="Artisanat_Maitre_en_Archerie" value="1"> Maitre en Archerie </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Travail_du_Bois" name="Initiation_Travail_du_Bois" value="1"> Initiation Travail du Bois </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Charpenterie" name="Charpenterie" value="1"> Charpenterie </label> <br/> <input type="checkbox" disabled="disabled" id="Menuiserie" name="Menuiserie"> Menuiserie </input> <br/> <input type="checkbox" disabled="disabled" id="Ebenisterie" name="Ebenisterie"> Ebenisterie </input></td>
                                    <td><input type="checkbox" disabled="disabled" id="Charpenterie_Naval" name="Charpenterie_Naval" value="1"> Charpenterie Naval </label> <br/> <input type="checkbox" disabled="disabled" id="Tonnelier" name="Tonnelier"> Tonnelier </input> <br/> <input type="checkbox" disabled="disabled" id="Sculpture_en_Bois" name="Sculpture_en_Bois"> Sculpture en Bois </input></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Travail_Pierre" name="Initiation_Travail_Pierre" value="1"> Initiation Travail de la Pierre </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Travail_Pierre" name="Maitre_Travail_Pierre" value="1"> Maitre Travail de la Pierre </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Sculpture_Pierre" name="Sculpture_Pierre" value="1"> Sculpture en Pierre </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Travail_Metal" name="Initiation_Travail_Metal" value="1"> Initiation Travail du Metal </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Fabrication_Armure" name="Fabrication_Armure" value="1"> Fabrication Armure </input> <br/> <input type="checkbox" disabled="disabled" id="Fabrication_Arme" name="Fabrication_Arme" value="1"> Fabrication Arme </input> <br/> <input type="checkbox" disabled="disabled" id="Fabrication_Outillage" name="Fabrication_Outillage" value="1"> Fabrication Outillage </input> <br/> <input type="checkbox" disabled="disabled" id="Orfevrerie" name="Orfevrerie" value="1"> Orfevrerie </label> <br/> <input type="checkbox" disabled="disabled" id="Forgeron" name="Forgeron" value="1"> Forgeron </label></td>
                                    <td><input disabled="disabled" id="Maitre_Fabrication_Armure" type="checkbox" name="Maitre_Fabrication_Armure" value="1"> Maitre Fabrication Armure </input> <br/> <input type="checkbox" id="Maitre_Fabrication_Arme" name="Maitre_Fabrication_Arme" disabled="disabled" value="1"> Maitre Fabrication Arme </input> <br/> <input type="checkbox" id="Maitre_Fabrication_Outillage" name="Maitre_Fabrication_Outillage" disabled="disabled" value="1"> Maitre Fabrication Outillage </input> <br/> <input type="checkbox" id="Maitre_Orfevre" name="Maitre_Orfevre" disabled="disabled" value="1"> Maitre Orfèvre </input></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Fonderie" name="Fonderie" value="1"> Fonderie </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Fonderie_metaux_précieux" name="Fonderie_metaux_précieux" value="1"> Fonderie métaux précieux </label></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_Verre" name="Initiation_Verre" value="1"> Initiation au métier du verre </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Verre" name="Maitre_Verre" value="1"> Maitre dans le travail du verre </label></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_argile" name="Initiation_argile" value="1"> Initiation travail de l'argile </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Briqueterie" name="Briqueterie" value="1"> Briqueterie </label> <br/> <input type="checkbox" disabled="disabled" id="Poterie" name="Poterie" value="1"> Poterie </label></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Initiation_tissu" name="Initiation_tissu" value="1"> Initiation travail du tissu </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Couture" name="Couture" value="1"> Couture </label> <br/> <input type="checkbox" disabled="disabled" id="Teinturerie" name="Teinturerie" value="1"> Teinturerie </label></td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Papeterie" name="Papeterie" value="1"> Papeterie </label> </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="Peche" name="Peche" value="1"> Pêche </label> </td>
                                  </tr>
                                <tr>
                                    <td><input type="checkbox" id="Agriculture" name="Agriculture" value="1"> Agriculture </label> </td>
                                  </tr>
                                <tr>
                                    <td><input type="checkbox" id="Horticulture" name="Horticulture" value="1"> Horticulture </label> </td>
                                  </tr>
                                <tr>
                                    <td><input type="checkbox" id="Dressage_equestre" name="Dressage_equestre" value="1"> Dressage équestre </label> </td>
                                  </tr>
                              </tbody>
                            </table>
                            <h3>Combat</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Palier 1</th>
                                  <th>Palier 2</th>
                                  <th>Palier 3</th>
                                  <th>Palier 4</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input type="checkbox" id="Maitrise_Combat_Arme" name="Maitrise_Combat_Arme" value="1"> Maitrise Combat avec Arme </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Arme_Distance" name="Arme_Distance" value="1"> Arme à Distance </label> <br/> <br/> <input type="checkbox" disabled="disabled" id="Arme_melee" name="Arme_melee" value="1"> Arme de mélée </label></td> 
                                    <td><input type="checkbox" disabled="disabled" id="Archerie" name="Archerie" value="1"> Archerie </label> <br/> <input type="checkbox" disabled="disabled" id="Arbalettrier" name="Arbalettrier" value="1"> Arbalétrier </label> <br/> <input type="checkbox" disabled="disabled" id="Combat_arme_tranchante" name="Combat_arme_tranchante" value="1"> Combat arme tranchante </label> <br/> <input type="checkbox" disabled="disabled" id="Combat_arme_Contondante" name="Combat_arme_Contondante" value="1"> Combat arme Contondante </label> <br/> <input type="checkbox" disabled="disabled" id="Combat_arme_courte" name="Combat_arme_courte" value="1"> Combat arme courte </label> <br/> <input type="checkbox" disabled="disabled" id="Combat_arme_hast" name="Combat_arme_hast" value="1"> Combat arme d'hast </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Maitre_Archerie" name="Maitre_Archerie" value="1"> Maitre Archerie </label> <br/> <input type="checkbox" disabled="disabled" id="Maitre_Arbalettrier" name="Maitre_Arbalettrier" value="1"> Maitre Arbalettrier </label> <br/> <input type="checkbox" disabled="disabled" id="Maitre_Combat_arme_tranchante" name="Maitre_Combat_arme_tranchante" value="1"> Maitre combat arme tranchante </label> <br/> <input type="checkbox" disabled="disabled" id="Maitre_Combat_arme_Contondante" name="Maitre_Combat_arme_Contondante" value="1"> Maitre combat arme Contondante </label> <br/> <input type="checkbox" disabled="disabled" id="Maitre_Combat_arme_courte" name="Maitre_Combat_arme_courte" value="1"> Maitre combat arme courte </label> <br/> <input type="checkbox" disabled="disabled" id="Maitre_Combat_arme_hast" name="Maitre_Combat_arme_hast" value="1"> Maitre combat arme d'hast </label></td>
                                 </tr>
                                 <tr>
                                    <td><input type="checkbox" id="Combat_main_nue_1" name="Combat_main_nue_1" value="1"> Combat à main nue niveau 1 </label> </td>
                                    <td><input type="checkbox" disabled="disabled" id="Combat_main_nue_2" name="Combat_main_nue_2" value="1"> Combat à main nue niveau 2 </label></td> 
                                    <td><input type="checkbox" disabled="disabled" id="Combat_main_nue_3" name="Combat_main_nue_3" value="1"> Combat à main nue niveau 3 </label></td>
                                 </tr>
                              </tbody>
                            </table>
                        </div>

                        <div class="borderLegion">
                            <h3>Paragraphe RP</h3>
                            <h2><small>Présentation dans paragraphes:</small></h2>
                            <textarea id="rp" class="form-control" rows="20" name="paragrapheRP" placeholder="Un paragraphe présentant votre personnage."></textarea>
                            <br/> 
                            <button class="btn btn-lg btn-primary btn-block" style="width: 260px;" type="submit">Poster ma candidature</button>
                            <br/>
                        </div>
                  </form>

                <script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
                                <script type="text/javascript">
                                tinymce.init({
                                        selector: "#rp",
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