<?php
require '../../aof/conf.php';

AOFInit();
require '../../aof/header.php';
require '../../aof/bdd_connect.php';  
require '../../aof/permissions/permissions.php';

if(isset($_SESSION['connect']) && AOF_permissions($_SESSION['connect'])
{?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>légion Network - Candidature</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container" style="text-align: center;">
<?php 
$bdd = AOF_connect();
//REROLL
$stopAccount = 1;
$reply = $bdd->query('SELECT * FROM legionCharacter');
            while($stopAccount != 0 && $data = $reply->fetch())
            {
                if($_SESSION['id'] == $data['account_id'] && $data['playable'] == 1) 
                {
                   $stopAccount = 0;
                }
                else
                {
                    $stopAccount = 1;
                }
            }

            if($stopAccount == 0)
            {
                $reqaccept = $bdd->prepare('UPDATE legionCharacter SET playable = :playable WHERE account_id = '.$_SESSION['id']);
                 $reqaccept->execute(array(
                       'playable' => -1
	                    )); 
            }

//General
$firstName = $_POST['firstName']; 
$name = $_POST['name']; 
$age = $_POST['age']; 
$ethnie = $_POST['ethnie']; 

///Paragraphe
$paragrapheIRL = $_POST['paragrapheIRL'];
$paragraphePresentation = $_POST['paragraphePresentation'];
$paragraphePresentationMental = $_POST['paragraphePresentationMental'];

//Compétence
if( ! isset( $_POST['Maitrise_du_Bucheronnage_niveau_1'] ) ) //Bucheronnage
{ $Maitrise_du_Bucheronnage_niveau_1 = 0;
}else { $Maitrise_du_Bucheronnage_niveau_1 = $_POST['Maitrise_du_Bucheronnage_niveau_1']; }
if( ! isset( $_POST['Maitrise_du_Bucheronnage_niveau_2'] ) ) 
{ $Maitrise_du_Bucheronnage_niveau_2 = 0;
}else { $Maitrise_du_Bucheronnage_niveau_2 = $_POST['Maitrise_du_Bucheronnage_niveau_2']; }
if( ! isset( $_POST['Maitrise_du_Bucheronnage_niveau_3'] ) ) 
{ $Maitrise_du_Bucheronnage_niveau_3 = 0;
}else { $Maitrise_du_Bucheronnage_niveau_3 = $_POST['Maitrise_du_Bucheronnage_niveau_3']; }


if( ! isset( $Maitrise_du_Minage_niveau_1 ) ) //Minage
{ $Maitrise_du_Minage_niveau_1 = $_POST['Maitrise_du_Minage_niveau_1'];
}else { $Maitrise_du_Minage_niveau_1 = 0; }
if( ! isset( $Maitrise_du_Minage_niveau_2 ) ) 
{ $Maitrise_du_Minage_niveau_2 = $_POST['Maitrise_du_Minage_niveau_2'];
}else { $Maitrise_du_Minage_niveau_2 = 0; }
if( ! isset( $Maitrise_du_Minage_niveau_3 ) ) 
{ $Maitrise_du_Minage_niveau_3 = $_POST['Maitrise_du_Minage_niveau_3'];
}else { $Maitrise_du_Minage_niveau_3 = 0; }


if( ! isset( $Maitrise_de_Excavation_Pierre_niveau_1 ) ) //Pierre
{ $Maitrise_de_Excavation_Pierre_niveau_1 = $_POST['Maitrise_de_Excavation_Pierre_niveau_1'];
}else { $Maitrise_de_Excavation_Pierre_niveau_1 = 0; }
if( ! isset( $Maitrise_de_Excavation_Pierre_niveau_2 ) ) 
{ $Maitrise_de_Excavation_Pierre_niveau_2 = $_POST['Maitrise_de_Excavation_Pierre_niveau_2'];
}else { $Maitrise_de_Excavation_Pierre_niveau_2 = 0; }
if( ! isset( $Maitrise_de_Excavation_Pierre_niveau_3 ) ) 
{ $Maitrise_de_Excavation_Pierre_niveau_3 = $_POST['Maitrise_de_Excavation_Pierre_niveau_3'];
}else { $Maitrise_de_Excavation_Pierre_niveau_3 = 0; }

if( ! isset( $Cuistot ) ) //Cuisine
{ $Cuistot = $_POST['Cuistot'];
}else { $Cuistot = 0; }
if( ! isset( $Cuisinier ) ) 
{ $Cuisinier = $_POST['Cuisinier'];
}else { $Cuisinier = 0; }
if( ! isset( $Maitre_Cuisinier ) ) 
{ $Maitre_Cuisinier = $_POST['Maitre_Cuisinier'];
}else { $Maitre_Cuisinier = 0; }

if( ! isset( $Initiation_Patisserie ) ) //Initiation_Patisserie
{ $Initiation_Patisserie = $_POST['Initiation_Patisserie'];
}else { $Initiation_Patisserie = 0; }
if( ! isset( $Patissier ) ) 
{ $Patissier = $_POST['Patissier'];
}else { $Patissier = 0; }
if( ! isset( $Maitre_Patissier ) ) 
{ $Maitre_Patissier = $_POST['Maitre_Patissier'];
}else { $Maitre_Patissier = 0; }

if( ! isset( $Initiation_Boulangerie ) ) //Initiation_Boulangerie
{ $Initiation_Boulangerie = $_POST['Initiation_Boulangerie'];
}else { $Initiation_Boulangerie = 0; }
if( ! isset( $Boulanger ) ) 
{ $Boulanger = $_POST['Boulanger'];
}else { $Boulanger = 0; }
if( ! isset( $Maitre_Boulanger ) ) 
{ $Maitre_Boulanger = $_POST['Maitre_Boulanger'];
}else { $Maitre_Boulanger = 0; }

if( ! isset( $Boucherie_Charcuterie ) ) //Boucherie_Charcuterie
{ $Boucherie_Charcuterie = $_POST['Boucherie_Charcuterie'];
}else { $Boucherie_Charcuterie = 0; }

if( ! isset( $Initiation_Travail_du_Bois ) ) //Initiation_Travail_du_Bois
{ $Initiation_Travail_du_Bois = $_POST['Initiation_Travail_du_Bois'];
}else { $Initiation_Travail_du_Bois = 0; }
if( ! isset( $Charpenterie ) ) 
{ $Charpenterie = $_POST['Charpenterie'];
}else { $Charpenterie = 0; }
if( ! isset( $Charpenterie_Naval ) ) 
{ $Charpenterie_Naval = $_POST['Charpenterie_Naval'];
}else { $Charpenterie_Naval = 0; }

if( ! isset( $Menuiserie ) ) //Menuiserie
{ $Menuiserie = $_POST['Menuiserie'];
}else { $Menuiserie = 0; }
if( ! isset( $Tonnelier ) ) 
{ $Tonnelier = $_POST['Tonnelier'];
}else { $Tonnelier = 0; }
if( ! isset( $Sculpture_en_Bois ) ) 
{ $Sculpture_en_Bois = $_POST['Sculpture_en_Bois'];
}else { $Sculpture_en_Bois = 0; }

if( ! isset( $Ebenisterie ) ) //Ebenisterie
{ $Ebenisterie = $_POST['Ebenisterie'];
}else { $Ebenisterie = 0; }

if( ! isset( $Initiation_Travail_Pierre ) ) //Initiation_Travail_Pierre
{ $Initiation_Travail_Pierre = $_POST['Initiation_Travail_Pierre'];
}else { $Initiation_Travail_Pierre = 0; }
if( ! isset( $Maitre_Travail_Pierre ) ) 
{ $Maitre_Travail_Pierre = $_POST['Maitre_Travail_Pierre'];
}else { $Maitre_Travail_Pierre = 0; }
if( ! isset( $Sculpture_Pierre ) ) 
{ $Sculpture_Pierre = $_POST['Sculpture_Pierre'];
}else { $Sculpture_Pierre = 0; }

if( ! isset( $Initiation_Travail_Metal ) ) //Initiation_Travail_Metal
{ $Initiation_Travail_Metal = $_POST['Initiation_Travail_Metal'];
}else { $Initiation_Travail_Metal = 0; }
if( ! isset( $Fabrication_Armure ) ) 
{ $Fabrication_Armure = $_POST['Fabrication_Armure'];
}else { $Fabrication_Armure = 0; }
if( ! isset( $Fabrication_Arme ) ) 
{ $Fabrication_Arme = $_POST['Fabrication_Arme'];
}else { $Fabrication_Arme = 0; }
if( ! isset( $Fabrication_Outillage ) ) 
{ $Fabrication_Outillage = $_POST['Fabrication_Outillage'];
}else { $Fabrication_Outillage = 0; }
if( ! isset( $Orfevrerie ) ) 
{ $Orfevrerie = $_POST['Orfevrerie'];
}else { $Orfevrerie = 0; }
if( ! isset( $Forgeron ) ) 
{ $Forgeron = $_POST['Forgeron'];
}else { $Forgeron = 0; }

if( ! isset( $Maitre_Fabrication_Armure ) ) 
{ $Maitre_Fabrication_Armure = $_POST['Maitre_Fabrication_Armure'];
}else { $Maitre_Fabrication_Armure = 0; }
if( ! isset( $Maitre_Fabrication_Arme ) ) 
{ $Maitre_Fabrication_Arme = $_POST['Maitre_Fabrication_Arme'];
}else { $Maitre_Fabrication_Arme = 0; }
if( ! isset( $Maitre_Fabrication_Outillage ) ) 
{ $Maitre_Fabrication_Outillage = $_POST['Maitre_Fabrication_Outillage'];
}else { $Maitre_Fabrication_Outillage = 0; }
if( ! isset( $Maitre_Orfevre ) ) 
{ $Maitre_Orfevre = $_POST['Maitre_Orfevre'];
}else { $Maitre_Orfevre = 0; }

if( ! isset( $Fonderie ) ) //Fonderie
{ $Fonderie = $_POST['Fonderie'];
}else { $Fonderie = 0; }
if( ! isset( $Fonderie_metaux_précieux ) ) 
{ $Fonderie_metaux_précieux = $_POST['Fonderie_metaux_précieux'];
}else { $Fonderie_metaux_précieux = 0; }

if( ! isset( $Initiation_Verre ) ) //Initiation_Verre
{ $Initiation_Verre = $_POST['Initiation_Verre'];
}else { $Initiation_Verre = 0; }
if( ! isset( $Maitre_Verre ) ) 
{ $Maitre_Verre = $_POST['Maitre_Verre'];
}else { $Maitre_Verre = 0; }

if( ! isset( $Initiation_argile ) ) //Initiation_argile
{ $Initiation_argile = $_POST['Initiation_argile'];
}else { $Initiation_argile = 0; }
if( ! isset( $Briqueterie ) ) 
{ $Briqueterie = $_POST['Briqueterie'];
}else { $Briqueterie = 0; }
if( ! isset( $Poterie ) ) 
{ $Poterie = $_POST['Poterie'];
}else { $Poterie = 0; }

if( ! isset( $Initiation_tissu ) ) //Initiation_tissu
{ $Initiation_tissu = $_POST['Initiation_tissu'];
}else { $Initiation_tissu = 0; }
if( ! isset( $Couture ) ) 
{ $Couture = $_POST['Couture'];
}else { $Couture = 0; }
if( ! isset( $Teinturerie ) ) 
{ $Teinturerie = $_POST['Teinturerie'];
}else { $Teinturerie = 0; }

if( ! isset( $Combat_main_nue_1 ) ) //Combat_main_nue_1
{ $Combat_main_nue_1 = $_POST['Combat_main_nue_1'];
}else { $Combat_main_nue_1 = 0; }
if( ! isset( $Combat_main_nue_2 ) ) 
{ $Combat_main_nue_2 = $_POST['Combat_main_nue_2'];
}else { $Combat_main_nue_2 = 0; }
if( ! isset( $Combat_main_nue_3 ) ) 
{ $Combat_main_nue_3 = $_POST['Combat_main_nue_3'];
}else { $Combat_main_nue_3 = 0; }

if( ! isset( $Maitrise_Combat_Arme ) ) //Maitrise_Combat_Arme
{ $Maitrise_Combat_Arme = $_POST['Maitrise_Combat_Arme'];
}else { $Maitrise_Combat_Arme = 0; }
if( ! isset( $Arme_Distance ) ) 
{ $Arme_Distance = $_POST['Arme_Distance'];
}else { $Arme_Distance = 0; }
if( ! isset( $Arme_melee ) ) 
{ $Arme_melee = $_POST['Arme_melee'];
}else { $Arme_melee = 0; }

if( ! isset( $Archerie ) ) 
{ $Archerie = $_POST['Archerie'];
}else { $Archerie = 0; }
if( ! isset( $Arbalettrier ) ) 
{ $Arbalettrier = $_POST['Arbalettrier'];
}else { $Arbalettrier = 0; }
if( ! isset( $Combat_arme_tranchante ) ) 
{ $Combat_arme_tranchante = $_POST['Combat_arme_tranchante'];
}else { $Combat_arme_tranchante = 0; }
if( ! isset( $Combat_arme_Contondante ) ) 
{ $Combat_arme_Contondante = $_POST['Combat_arme_Contondante'];
}else { $Combat_arme_Contondante = 0; }
if( ! isset( $Combat_arme_courte ) ) 
{ $Combat_arme_courte = $_POST['Combat_arme_courte'];
}else { $Combat_arme_courte = 0; }
if( ! isset( $Combat_arme_hast ) ) 
{ $Combat_arme_hast = $_POST['Combat_arme_hast'];
}else { $Combat_arme_hast = 0; }

if( ! isset( $Maitre_Archerie ) ) 
{ $Maitre_Archerie = $_POST['Maitre_Archerie'];
}else { $Maitre_Archerie = 0; }
if( ! isset( $Maitre_Arbalettrier ) ) 
{ $Maitre_Arbalettrier = $_POST['Maitre_Arbalettrier'];
}else { $Maitre_Arbalettrier = 0; }
if( ! isset( $Maitre_Combat_arme_tranchante ) ) 
{ $Maitre_Combat_arme_tranchante = $_POST['Maitre_Combat_arme_tranchante'];
}else { $Maitre_Combat_arme_tranchante = 0; }
if( ! isset( $Maitre_Combat_arme_Contondante ) ) 
{ $Maitre_Combat_arme_Contondante = $_POST['Maitre_Combat_arme_Contondante'];
}else { $Maitre_Combat_arme_Contondante = 0; }
if( ! isset( $Maitre_Combat_arme_courte ) ) 
{ $Maitre_Combat_arme_courte = $_POST['Maitre_Combat_arme_courte'];
}else { $Maitre_Combat_arme_courte = 0; }
if( ! isset( $Maitre_Combat_arme_hast ) ) 
{ $Maitre_Combat_arme_hast = $_POST['Maitre_Combat_arme_hast'];
}else { $Maitre_Combat_arme_hast = 0; }

if( ! isset( $Initiation_Tannerie ) ) //Initiation_Tannerie
{ $Initiation_Tannerie = $_POST['Initiation_Tannerie'];
}else { $Initiation_Tannerie = 0; }
if( ! isset( $Tannerie ) ) 
{ $Tannerie = $_POST['Tannerie'];
}else { $Tannerie = 0; }
if( ! isset( $Maitre_en_Tannerie ) ) 
{ $Maitre_en_Tannerie = $_POST['Maitre_en_Tannerie'];
}else { $Maitre_en_Tannerie = 0; }

if( ! isset( $Artisanat_Initiation_Archerie ) ) //Artisanat_Initiation_Archerie
{ $Artisanat_Initiation_Archerie = $_POST['Artisanat_Initiation_Archerie'];
}else { $Artisanat_Initiation_Archerie = 0; }
if( ! isset( $Artisanat_Archerie ) ) 
{ $Artisanat_Archerie = $_POST['Artisanat_Archerie'];
}else { $Artisanat_Archerie = 0; }
if( ! isset( $Artisanat_Maitre_en_Archerie ) ) 
{ $Artisanat_Maitre_en_Archerie = $_POST['Artisanat_Maitre_en_Archerie'];
}else { $Artisanat_Maitre_en_Archerie = 0; }

if( ! isset( $Papeterie ) ) 
{ $Papeterie = $_POST['Papeterie'];
}else { $Papeterie = 0; }

if( ! isset( $Peche ) ) 
{ $Peche = $_POST['Peche'];
}else { $Peche = 0; }

if( ! isset( $Agriculture ) ) 
{ $Agriculture = $_POST['Agriculture'];
}else { $Agriculture = 0; }

if( ! isset( $Horticulture ) ) 
{ $Horticulture = $_POST['Horticulture'];
}else { $Horticulture = 0; }

if( ! isset( $Dressage_equestre ) ) 
{ $Dressage_equestre = $_POST['Dressage_equestre'];
}else { $Dressage_equestre = 0; }

//Paragraphe RP
$paragrapheRP = $_POST['paragrapheRP'];

$stop = 1;

//Date
$date = new Datetime('now', new DateTimeZone('Europe/Paris'));

if(!empty($paragrapheIRL) and !empty($firstName) and !empty($name) and !empty($age) and !empty($paragraphePresentation) and !empty($paragraphePresentationMental) and !empty($paragrapheRP))
{
               $req = $bdd->prepare('INSERT INTO legionCandidacy(poster_id, minecraftpseudo, date, firstName, name, age, ethnie, paragraphePresentation, paragraphePresentationMental, paragrapheRP, paragrapheIRL) VALUES(:poster_id, :minecraftpseudo, :date, :firstName, :name, :age, :ethnie, :paragraphePresentation, :paragraphePresentationMental, :paragrapheRP, :paragrapheIRL)');
                     $req->execute(array(
	                    'poster_id' => $_SESSION['id'],
                        'minecraftpseudo' =>  $_SESSION['user'],
	                    'date' => $date->format('Y-m-d H:i:s'),
                        'firstName' => $firstName,
	                    'name' => $name,
                        'age' => $age,
                        'ethnie' => $ethnie,
                        'paragraphePresentation' => $paragraphePresentation,
                        'paragraphePresentationMental' => $paragraphePresentationMental,
                        'paragrapheRP' => $paragrapheRP,
                        'paragrapheIRL' => $paragrapheIRL
	                ));

                $characterName = $name." ".$firstName;
                 $reqCharacter = $bdd->prepare('INSERT INTO legionCharacter(account_id, minecraftpseudo, CharacterName, Infecte, age) VALUES(:account_id,:minecraftpseudo,:CharacterName,:Infecte,:age)');
                             $reqCharacter->execute(array(
	                            'account_id' =>  $_SESSION['id'],
	                            'minecraftpseudo' =>  $_SESSION['user'],
                                'CharacterName' => $characterName,
                                'Infecte' => $ethnie,
                                'age' => $age
	                        ));
                                    
                     //Skin upload
                     $dossier = '../../skin/';
                     $fichier = basename($_FILES['skinFile']['name']);

                            $fichier = $_SESSION['user'].'.png';
                            if(move_uploaded_file($_FILES['skinFile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné.
                            {   }
                            else {
                                    echo '<p class="bg-danger"> Erreur lors de upload de Skin Minecraft ...</p>';
                                     ?>
                                        <meta http-equiv="refresh" content="2; URL=../../dashboard.php">
                                    <?php
                            } 

                    //Compétence
                   $reply = $bdd->query('SELECT * FROM legionCharacter ORDER BY id DESC');
                    while($stop != 0 && $data = $reply->fetch())
                    {
                        if($_SESSION['id'] == $data['account_id'])
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
                        $idCharacter = $data['id'];

                        //Commun
                        $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 1,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));

                        //Maitrise_du_Bucheronnage
                        if($Maitrise_du_Bucheronnage_niveau_3 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 3,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 6000
	                        ));
                        }
                        elseif($Maitrise_du_Bucheronnage_niveau_2 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 3,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 4000
	                        ));
                             
                        }
                        elseif($Maitrise_du_Bucheronnage_niveau_1 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 3,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 2000
	                        ));
                             
                        }

                         //Maitrise_du_Minage
                        if($Maitrise_du_Minage_niveau_3 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 4,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 6000
	                        ));
                             
                        }
                        elseif($Maitrise_du_Minage_niveau_2 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 4,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 4000
	                        ));
                             
                        }
                        elseif($Maitrise_du_Minage_niveau_1 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 4,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 2000
	                        ));
                             
                        }

                        //Maitrise_de_Excavation_Pierre
                        if($Maitrise_de_Excavation_Pierre_niveau_3 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 5,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 6000
	                        ));
                             
                        }
                        elseif($Maitrise_de_Excavation_Pierre_niveau_2 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 5,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 4000
	                        ));
                             
                        }
                        elseif($Maitrise_de_Excavation_Pierre_niveau_1 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 5,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 2000
	                        ));
                             
                        }

                        //Cuisinier
                        if($Maitre_Cuisinier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 51,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Cuisinier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 50,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Cuistot == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 49,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Patisserie
                        if($Maitre_Patissier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 54,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Patissier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 53,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Initiation_Patisserie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 52,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Boulangerie
                        if($Maitre_Boulanger == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 57,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Boulanger == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 56,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Initiation_Boulangerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 55,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Boucherie_Charcuterie
                        if($Boucherie_Charcuterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 58,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Travail_du_Bois
                        if($Charpenterie_Naval == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 10,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Charpenterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 7,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Initiation_Travail_du_Bois == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 6,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Menuiserie
                        if($Menuiserie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 8,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Sculpture_en_Bois == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 12,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Tonnelier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 11,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Ebenisterie
                        if($Ebenisterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 9,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Travail_Pierre
                        if($Initiation_Travail_Pierre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 13,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Travail_Pierre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 14,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Sculpture_Pierre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 15,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Travail_Metal
                         if($Initiation_Travail_Metal == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 16,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Fabrication_Armure == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 17,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Fabrication_Arme == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 19,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Fabrication_Outillage == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 21,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Orfevrerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 24,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Forgeron == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 22,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        if($Maitre_Fabrication_Armure == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 18,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Fabrication_Arme == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 20,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Fabrication_Outillage == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 23,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Orfevre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 25,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Fonderie
                        if($Fonderie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 26,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Fonderie_metaux_précieux == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 27,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Verre
                        if($Initiation_Verre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 28,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Verre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 29,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_argile
                        if($Initiation_argile == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 30,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Briqueterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 31,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Poterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 33,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_tissu
                        if($Initiation_tissu == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 35,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Couture == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 36,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Teinturerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 37,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Combat_main_nue_1
                        if($Combat_main_nue_1 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 74,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_main_nue_2 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 75,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_main_nue_3 == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 76,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Maitrise_Combat_Arme
                        if($Maitrise_Combat_Arme == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 59,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Arme_Distance == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 60,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Arme_melee == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 65,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        if($Archerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 61,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Arbalettrier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 63,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_arme_tranchante == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 66,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_arme_Contondante == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 68,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_arme_courte == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 70,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Combat_arme_hast == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 72,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        if($Maitre_Archerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 62,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Arbalettrier == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 64,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Combat_arme_tranchante == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 67,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Combat_arme_Contondante == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 69,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Combat_arme_courte == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 71,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }
                        if($Maitre_Combat_arme_hast == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 73,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                             
                        }

                        //Initiation_Tannerie
                        if($Initiation_Tannerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 38,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                        }
                        if($Tannerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 39,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                        }
                        if($Maitre_en_Tannerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 40,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        //Artisanat_Initiation_Archerie
                        if($Artisanat_Initiation_Archerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 41,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                        }
                        if($Artisanat_Archerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 42,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));
                        }
                        if($Artisanat_Maitre_en_Archerie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 43,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        if($Papeterie == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 44,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        if($Peche == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 45,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        if($Agriculture == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 46,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        if($Horticulture == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 47,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        if($Dressage_equestre == 1)
                        {
                             $req = $bdd->prepare('INSERT INTO legionCharacterAndSkill(IdSkill, IdCharacter, Value) VALUES(:IdSkill, :IdCharacter, :Value)');
                             $req->execute(array(
	                            'IdSkill' => 48,
	                            'IdCharacter' => $idCharacter,
                                'Value' => 1
	                        ));   
                        }

                        $reply->closeCursor();
                        //Finish
                        echo '<p class="bg-success"> Candidature envoyé, vous serez informer par Mail si votre candidature est accpeté ! </p>';
                                 ?>
                                   <meta http-equiv="refresh" content="2; URL=../../dashboard.php">
                                <?php
                    }
                    else
                    {
                        echo '<p class="bg-danger"> Erreur inconnu lors de la recherche de id de candidature. Contactez un Admin.</p>';
                        ?>
                            <meta http-equiv="refresh" content="2; URL=../../candidacy.php">
                        <?php
                    }
             }
             else
             {
                 echo '<p class="bg-danger"> Certains champs ne sont pas remplit.</p>';
             ?>
                <meta http-equiv="refresh" content="2; URL=../../candidacy.php">
            <?php
             }
             ?>
    </div>
</body>
</html>
<?php
 }
 else
 {
     echo '<p class="bg-danger"> Votre connexion est dépasé (Correction de bug en cours, merci de renvoyé votre candidature).</p>';
 ?>
    <meta http-equiv="refresh" content="6; URL=../../index.php">
<?php
 }
 ?>
