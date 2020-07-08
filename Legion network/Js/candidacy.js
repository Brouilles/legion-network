$(function () {
    $actualPoint = " Erreur, âge invalide !";
    function update() {
        $("#age").change(function () {
            $age = $("#age").val();

            if ($age < 3) {
                $actualPoint = 0;
            }
            else if ($age >= 3 && $age < 8) {
                $actualPoint = ($age * 2) - 3;
            }
            else if ($age >= 8 && $age < 30) {
                $actualPoint = ($age * 4) - 3;
            }
            else if ($age >= 30) {
                $actualPoint = 117;
            }
        });
        countChecked();
        $("input[type=checkbox]").on("click", countChecked);
    }; setInterval(update, 100);

    var countChecked = function () {
        var n = $("input:checked").length;
        $("#point").text((-25 * n) + $actualPoint);
    };

    //Récolte
    //Maitrise du Bucheronnage
    $('#Maitrise_du_Bucheronnage_niveau_1').click(enable_palier2_Maitrise_du_Bucheronnage_niveau_2);
    $('#Maitrise_du_Bucheronnage_niveau_2').click(enable_palier2_Maitrise_du_Bucheronnage_niveau_3);
    //Maitrise du Minage
    $('#Maitrise_du_Minage_niveau_1').click(enable_palier2_Maitrise_du_Minage_niveau_2);
    $('#Maitrise_du_Minage_niveau_2').click(enable_palier2_Maitrise_du_Minage_niveau_3);
    //Maitrise de l'Excavation de la Pierre
    $('#Maitrise_de_Excavation_Pierre_niveau_1').click(enable_palier2_Maitrise_de_Excavation_Pierre_niveau_2);
    $('#Maitrise_de_Excavation_Pierre_niveau_2').click(enable_palier2_Maitrise_de_Excavation_Pierre_niveau_3);
    //Cuistot
    $('#Cuistot').click(enable_palier2_Cuisinier);
    $('#Cuisinier').click(enable_palier2_Maitre_Cuisinier);
    //Patisserie
    $('#Initiation_Patisserie').click(enable_palier2_Patissier);
    $('#Patissier').click(enable_palier2_Maitre_Patissier);
    //Boulangerie
    $('#Initiation_Boulangerie').click(enable_palier2_Boulangerie);
    $('#Boulanger').click(enable_palier2_Maitre_Boulangerie);

    //Artisanat
    //Initiation_Tannerie
    $('#Initiation_Tannerie').click(enable_palier2_Initiation_Tannerie);
    $('#Tannerie').click(enable_palier3_Tannerie);
    //Archerie
    $('#Artisanat_Initiation_Archerie').click(enable_palier2_Initiation_Artisanat_Archerie);
    $('#Artisanat_Archerie').click(enable_palier2_Artisanat_Archerie);
    //Bois - Initiation_Travail_du_Bois
    $('#Initiation_Travail_du_Bois').click(enable_palier2_bois);
    $('#Charpenterie').click(enable_palier2_Charpenterie);
    $('#Menuiserie').click(enable_palier2_Menuiserie);
    $('#Ebenisterie').click(enable_palier2_Ebenisterie);
    //Initiation Travail de la Pierre
    $('#Initiation_Travail_Pierre').click(enable_palier2_Initiation_Travail_Pierre);
    $('#Maitre_Travail_Pierre').click(enable_palier2_Maitre_Travail_Pierre);
    //Metal - Initiation_Travail_Metal
    $('#Initiation_Travail_Metal').click(enable_palier2_metal);
    $('#Fabrication_Armure').click(enable_palier2_metal_Maitre_Fabrication_Armure);
    $('#Fabrication_Arme').click(enable_palier2_metal_Maitre_Fabrication_Arme);
    $('#Fabrication_Outillage').click(enable_palier2_metal_Maitre_Fabrication_Outillage);
    $('#Orfevrerie').click(enable_palier2_metal_Orfevrerie);
    //Fonderie
    $('#Fonderie').click(enable_palier2_Fonderie);
    //Initiation_Verre
    $('#Initiation_Verre').click(enable_palier2_Maitre_Verre);
    //Initiation_argile
    $('#Initiation_argile').click(enable_palier2_Argile);
    //Initiation_tissu
    $('#Initiation_tissu').click(enable_palier2_Tissu);

    //Combat
    //Combat_main_nue
    $('#Combat_main_nue_1').click(enable_palier2_main_nue_2);
    $('#Combat_main_nue_2').click(enable_palier3_main_nue_3);
    //Maitrise Combat avec Arme
    $('#Maitrise_Combat_Arme').click(enable_palier2_maitrise_combat_arme);
    $('#Arme_Distance').click(enable_palier2_Arme_Distance);
    $('#Archerie').click(enable_palier2_Arme_Distance_Maitre_Archerie);
    $('#Arbalettrier').click(enable_palier2_Arme_Distance_Maitre_Arbalettrier);
    $('#Arme_melee').click(enable_palier2_Arme_Melee);
    $('#Combat_arme_tranchante').click(enable_palier2_Arme_Melee_Combat_arme_tranchante);
    $('#Combat_arme_Contondante').click(enable_palier2_Arme_Melee_Combat_arme_Contondante);
    $('#Combat_arme_courte').click(enable_palier2_Arme_Melee_Combat_arme_courte);
    $('#Combat_arme_hast').click(enable_palier2_Arme_Melee_Combat_arme_hast);
});

//Maitrise du Bucheronnage
function enable_palier2_Maitrise_du_Bucheronnage_niveau_2() {
  if (this.checked) {
    $("#Maitrise_du_Bucheronnage_niveau_2").prop("disabled", false);
  } else {
    $("#Maitrise_du_Bucheronnage_niveau_2").prop("disabled", true);
    $("#Maitrise_du_Bucheronnage_niveau_2").attr('checked', false); 

    //Master
    $("#Maitrise_du_Bucheronnage_niveau_3").prop("disabled", true);
    $("#Maitrise_du_Bucheronnage_niveau_3").attr('checked', false); 
  }
}

function enable_palier2_Maitrise_du_Bucheronnage_niveau_3() {
  if (this.checked) {
    $("#Maitrise_du_Bucheronnage_niveau_3").prop("disabled", false);
  } else {
    $("#Maitrise_du_Bucheronnage_niveau_3").prop("disabled", true);
    $("#Maitrise_du_Bucheronnage_niveau_3").attr('checked', false); 
  }
}

//Maitrise du Minage
function enable_palier2_Maitrise_du_Minage_niveau_2() {
  if (this.checked) {
    $("#Maitrise_du_Minage_niveau_2").prop("disabled", false);
  } else {
    $("#Maitrise_du_Minage_niveau_2").prop("disabled", true);
    $("#Maitrise_du_Minage_niveau_2").attr('checked', false); 

    //Master
    $("#Maitrise_du_Minage_niveau_3").prop("disabled", true);
    $("#Maitrise_du_Minage_niveau_3").attr('checked', false); 
  }
}

function enable_palier2_Maitrise_du_Minage_niveau_3() {
  if (this.checked) {
    $("#Maitrise_du_Minage_niveau_3").prop("disabled", false);
  } else {
    $("#Maitrise_du_Minage_niveau_3").prop("disabled", true);
    $("#Maitrise_du_Minage_niveau_3").attr('checked', false); 
  }
}

//Maitrise de l'Excavation de la Pierre
function enable_palier2_Maitrise_de_Excavation_Pierre_niveau_2() {
  if (this.checked) {
    $("#Maitrise_de_Excavation_Pierre_niveau_2").prop("disabled", false);
  } else {
    $("#Maitrise_de_Excavation_Pierre_niveau_2").prop("disabled", true);
    $("#Maitrise_de_Excavation_Pierre_niveau_2").attr('checked', false); 

    //Master
    $("#Maitrise_de_Excavation_Pierre_niveau_3").prop("disabled", true);
    $("#Maitrise_de_Excavation_Pierre_niveau_3").attr('checked', false); 
  }
}

function enable_palier2_Maitrise_de_Excavation_Pierre_niveau_3() {
  if (this.checked) {
    $("#Maitrise_de_Excavation_Pierre_niveau_3").prop("disabled", false);
  } else {
    $("#Maitrise_de_Excavation_Pierre_niveau_3").prop("disabled", true);
    $("#Maitrise_de_Excavation_Pierre_niveau_3").attr('checked', false); 
  }
}

//Cuistot
function enable_palier2_Cuisinier() {
  if (this.checked) {
    $("#Cuisinier").prop("disabled", false);
  } else {
    $("#Cuisinier").prop("disabled", true);
    $("#Cuisinier").attr('checked', false); 

    //Master
    $("#Maitre_Cuisinier").prop("disabled", true);
    $("#Maitre_Cuisinier").attr('checked', false); 
  }
}

function enable_palier2_Maitre_Cuisinier() {
  if (this.checked) {
    $("#Maitre_Cuisinier").prop("disabled", false);
  } else {
    $("#Maitre_Cuisinier").prop("disabled", true);
    $("#Maitre_Cuisinier").attr('checked', false); 
  }
}

//Patisserie
function enable_palier2_Patissier() {
  if (this.checked) {
    $("#Patissier").prop("disabled", false);
  } else {
    $("#Patissier").prop("disabled", true);
    $("#Patissier").attr('checked', false); 

    //Master
    $("#Maitre_Patissier").prop("disabled", true);
    $("#Maitre_Patissier").attr('checked', false); 
  }
}

function enable_palier2_Maitre_Patissier() {
  if (this.checked) {
    $("#Maitre_Patissier").prop("disabled", false);
  } else {
    $("#Maitre_Patissier").prop("disabled", true);
    $("#Maitre_Patissier").attr('checked', false); 
  }
}

//Boulangerie
function enable_palier2_Boulangerie() {
  if (this.checked) {
    $("#Boulanger").prop("disabled", false);
  } else {
    $("#Boulanger").prop("disabled", true);
    $("#Boulanger").attr('checked', false); 

    //Master
    $("#Maitre_Boulanger").prop("disabled", true);
    $("#Maitre_Boulanger").attr('checked', false); 
  }
}

function enable_palier2_Maitre_Boulangerie() {
  if (this.checked) {
    $("#Maitre_Boulanger").prop("disabled", false);
  } else {
    $("#Maitre_Boulanger").prop("disabled", true);
    $("#Maitre_Boulanger").attr('checked', false); 
  }
}

//Tannerie
function enable_palier2_Initiation_Tannerie() {
  if (this.checked) {
    $("#Tannerie").prop("disabled", false);
  } else {
    $("#Tannerie").prop("disabled", true);
    $("#Tannerie").attr('checked', false); 

    $("#Maitre_en_Tannerie").prop("disabled", true);
    $("#Maitre_en_Tannerie").attr('checked', false); 
  }    
}

function enable_palier3_Tannerie() {
  if (this.checked) {
    $("#Maitre_en_Tannerie").prop("disabled", false);
  } else {
    $("#Maitre_en_Tannerie").prop("disabled", true);
    $("#Maitre_en_Tannerie").attr('checked', false); 
  }     
}

//Archerie
function enable_palier2_Initiation_Artisanat_Archerie() {
  if (this.checked) {
    $("#Artisanat_Archerie").prop("disabled", false);
  } else {
    $("#Artisanat_Archerie").prop("disabled", true);
    $("#Artisanat_Archerie").attr('checked', false); 

    $("#Artisanat_Maitre_en_Archerie").prop("disabled", true);
    $("#Artisanat_Maitre_en_Archerie").attr('checked', false); 
  }      
}

function enable_palier2_Artisanat_Archerie() {
  if (this.checked) {
    $("#Artisanat_Maitre_en_Archerie").prop("disabled", false);
  } else {
    $("#Artisanat_Maitre_en_Archerie").prop("disabled", true);
    $("#Artisanat_Maitre_en_Archerie").attr('checked', false); 
  }     
}

//Bois - Initiation_Travail_du_Bois
function enable_palier2_bois() {
  if (this.checked) {
    $("#Charpenterie").prop("disabled", false);
    $("#Menuiserie").prop("disabled", false);
    $("#Ebenisterie").prop("disabled", false);
  } else {
    $("#Charpenterie").prop("disabled", true);
    $("#Charpenterie").attr('checked', false); 
    $("#Menuiserie").prop("disabled", true);
    $("#Menuiserie").attr('checked', false); 
    $("#Ebenisterie").prop("disabled", true);
    $("#Ebenisterie").attr('checked', false); 

    //Master
    $("#Charpenterie_Naval").prop("disabled", true);
    $("#Charpenterie_Naval").attr('checked', false); 

    $("#Tonnelier").prop("disabled", true);
    $("#Tonnelier").attr('checked', false); 

    $("#Sculpture_en_Bois").prop("disabled", true);
    $("#Sculpture_en_Bois").attr('checked', false); 
  }
}

function enable_palier2_Charpenterie() {
  if (this.checked) {
    $("#Charpenterie_Naval").prop("disabled", false);
  } else {
    $("#Charpenterie_Naval").prop("disabled", true);
    $("#Charpenterie_Naval").attr('checked', false); 
  }
}

function enable_palier2_Menuiserie() {
  if (this.checked) {
    $("#Tonnelier").prop("disabled", false);
    $("#Sculpture_en_Bois").prop("disabled", false);
  } else {
    $("#Tonnelier").prop("disabled", true);
    $("#Tonnelier").attr('checked', false); 

    $("#Sculpture_en_Bois").prop("disabled", true);
    $("#Sculpture_en_Bois").prop("checked", false);
  }
}

function enable_palier2_Ebenisterie() {
  if (this.checked) {
    $("#Sculpture_en_Bois").prop("disabled", false);
  } else {
    $("#Sculpture_en_Bois").prop("disabled", true);
    $("#Sculpture_en_Bois").attr('checked', false); 
  }
}

//Initiation Travail de la Pierre
function enable_palier2_Initiation_Travail_Pierre() {
  if (this.checked) {
    $("#Maitre_Travail_Pierre").prop("disabled", false);
  } else {
    $("#Maitre_Travail_Pierre").prop("disabled", true);
    $("#Maitre_Travail_Pierre").attr('checked', false); 

    //Master
    $("#Sculpture_Pierre").prop("disabled", true);
    $("#Sculpture_Pierre").attr('checked', false); 
  }
}

function enable_palier2_Maitre_Travail_Pierre() {
  if (this.checked) {
    $("#Sculpture_Pierre").prop("disabled", false);
  } else {
    $("#Sculpture_Pierre").prop("disabled", true);
    $("#Sculpture_Pierre").attr('checked', false); 
  }
}

//Metal - Initiation_Travail_Metal
function enable_palier2_metal() {
  if (this.checked) {
    $("#Orfevrerie").prop("disabled", false);
    $("#Forgeron").prop("disabled", false);
    $("#Fabrication_Armure").prop("disabled", false);
    $("#Fabrication_Arme").prop("disabled", false);
    $("#Fabrication_Outillage").prop("disabled", false);
  } else {
    $("#Orfevrerie").prop("disabled", true);
    $("#Orfevrerie").attr('checked', false); 
    $("#Forgeron").prop("disabled", true);
    $("#Forgeron").attr('checked', false);
    $("#Fabrication_Armure").prop("disabled", true);
    $("#Fabrication_Armure").attr('checked', false); 
    $("#Fabrication_Arme").prop("disabled", true);
    $("#Fabrication_Arme").attr('checked', false); 
    $("#Fabrication_Outillage").prop("disabled", true);
    $("#Fabrication_Outillage").attr('checked', false); 

    //Master
    $("#Maitre_Orfevre").prop("disabled", true);
    $("#Maitre_Orfevre").attr('checked', false); 

    $("#Maitre_Fabrication_Armure").prop("disabled", true);
    $("#Maitre_Fabrication_Armure").attr('checked', false); 

    $("#Maitre_Fabrication_Arme").prop("disabled", true);
    $("#Maitre_Fabrication_Arme").attr('checked', false); 

    $("#Maitre_Fabrication_Outillage").prop("disabled", true);
    $("#Maitre_Fabrication_Outillage").attr('checked', false); 
  }
}

function enable_palier2_metal_Maitre_Fabrication_Armure() {
  if (this.checked) {
    $("#Maitre_Fabrication_Armure").prop("disabled", false);
  } else {
    $("#Maitre_Fabrication_Armure").prop("disabled", true);
    $("#Maitre_Fabrication_Armure").attr('checked', false); 
  }
}

function enable_palier2_metal_Maitre_Fabrication_Arme() {
  if (this.checked) {
    $("#Maitre_Fabrication_Arme").prop("disabled", false);
  } else {
    $("#Maitre_Fabrication_Arme").prop("disabled", true);
    $("#Maitre_Fabrication_Arme").attr('checked', false); 
  }
}

function enable_palier2_metal_Maitre_Fabrication_Outillage() {
  if (this.checked) {
    $("#Maitre_Fabrication_Outillage").prop("disabled", false);
  } else {
    $("#Maitre_Fabrication_Outillage").prop("disabled", true);
    $("#Maitre_Fabrication_Outillage").attr('checked', false); 
  }
}

function enable_palier2_metal_Orfevrerie() {
  if (this.checked) {
    $("#Maitre_Orfevre").prop("disabled", false);
  } else {
    $("#Maitre_Orfevre").prop("disabled", true);
    $("#Maitre_Orfevre").attr('checked', false); 
  }
}

//Fonderie
function enable_palier2_Fonderie() {
    if (this.checked) {
    $("#Fonderie_metaux_précieux").prop("disabled", false);
  } else {
    $("#Fonderie_metaux_précieux").prop("disabled", true);
    $("#Fonderie_metaux_précieux").attr('checked', false); 
  }  
}

//Initiation_Verre
function enable_palier2_Maitre_Verre() {
    if (this.checked) {
    $("#Maitre_Verre").prop("disabled", false);
  } else {
    $("#Maitre_Verre").prop("disabled", true);
    $("#Maitre_Verre").attr('checked', false); 
  } 
}

//Initiation_argile
function enable_palier2_Argile() {
    if (this.checked) {
    $("#Briqueterie").prop("disabled", false);
    $("#Poterie").prop("disabled", false);
  } else {
    $("#Briqueterie").prop("disabled", true);
    $("#Briqueterie").attr('checked', false); 
    $("#Poterie").prop("disabled", true);
    $("#Poterie").attr('checked', false);
  }  
}

//Initiation_tissu
function enable_palier2_Tissu() {
    if (this.checked) {
    $("#Couture").prop("disabled", false);
    $("#Teinturerie").prop("disabled", false);
  } else {
    $("#Couture").prop("disabled", true);
    $("#Couture").attr('checked', false); 
    $("#Teinturerie").prop("disabled", true);
    $("#Teinturerie").attr('checked', false);
  }  
}

//Main mue
function enable_palier2_main_nue_2() {
    if (this.checked) {
    $("#Combat_main_nue_2").prop("disabled", false);
  } else {
    $("#Combat_main_nue_2").prop("disabled", true);
    $("#Combat_main_nue_2").attr('checked', false); 

    $("#Combat_main_nue_3").prop("disabled", true);
    $("#Combat_main_nue_3").attr('checked', false);
  }  
}

function enable_palier3_main_nue_3() {
    if (this.checked) {
    $("#Combat_main_nue_3").prop("disabled", false);
  } else {
    $("#Combat_main_nue_3").prop("disabled", true);
    $("#Combat_main_nue_3").attr('checked', false); 
  }  
}

//Maitrise Combat avec Arme
function enable_palier2_maitrise_combat_arme(){
    if (this.checked) {
    $("#Arme_Distance").prop("disabled", false);
    $("#Arme_melee").prop("disabled", false);
  } else {
    $("#Arme_Distance").prop("disabled", true);
    $("#Arme_Distance").attr('checked', false); 

    $("#Arme_melee").prop("disabled", true);
    $("#Arme_melee").attr('checked', false);

    //Normal
    $("#Archerie").prop("disabled", true);
    $("#Archerie").attr('checked', false); 

    $("#Arbalettrier").prop("disabled", true);
    $("#Arbalettrier").attr('checked', false); 

    $("#Combat_arme_tranchante").prop("disabled", true);
    $("#Combat_arme_tranchante").attr('checked', false); 

    $("#Combat_arme_Contondante").prop("disabled", true);
    $("#Combat_arme_Contondante").attr('checked', false); 

    $("#Combat_arme_courte").prop("disabled", true);
    $("#Combat_arme_courte").attr('checked', false); 

    $("#Combat_arme_hast").prop("disabled", true);
    $("#Combat_arme_hast").attr('checked', false); 

    //Master
    $("#Maitre_Archerie").prop("disabled", true);
    $("#Maitre_Archerie").attr('checked', false); 
    
    $("#Maitre_Arbalettrier").prop("disabled", true);
    $("#Maitre_Arbalettrier").attr('checked', false); 

    $("#Maitre_Combat_arme_tranchante").prop("disabled", true);
    $("#Maitre_Combat_arme_tranchante").attr('checked', false); 

    $("#Maitre_Combat_arme_Contondante").prop("disabled", true);
    $("#Maitre_Combat_arme_Contondante").attr('checked', false); 

    $("#Maitre_Combat_arme_courte").prop("disabled", true);
    $("#Maitre_Combat_arme_courte").attr('checked', false);

    $("#Maitre_Combat_arme_hast").prop("disabled", true);
    $("#Maitre_Combat_arme_hast").attr('checked', false); 
  }  
}

//Distance
function enable_palier2_Arme_Distance() {
    if (this.checked) {
    $("#Archerie").prop("disabled", false);
    $("#Arbalettrier").prop("disabled", false);
  } else {
    $("#Archerie").prop("disabled", true);
    $("#Archerie").attr('checked', false); 

    $("#Arbalettrier").prop("disabled", true);
    $("#Arbalettrier").attr('checked', false); 

    //Master
    $("#Maitre_Archerie").prop("disabled", true);
    $("#Maitre_Archerie").attr('checked', false); 
    
    $("#Maitre_Arbalettrier").prop("disabled", true);
    $("#Maitre_Arbalettrier").attr('checked', false); 
  }  
}

function enable_palier2_Arme_Distance_Maitre_Archerie() {
    if (this.checked) {
    $("#Maitre_Archerie").prop("disabled", false);
  } else {
    $("#Maitre_Archerie").prop("disabled", true);
    $("#Maitre_Archerie").attr('checked', false); 
  } 
}

function enable_palier2_Arme_Distance_Maitre_Arbalettrier() {
    if (this.checked) {
    $("#Maitre_Arbalettrier").prop("disabled", false);
  } else {
    $("#Maitre_Arbalettrier").prop("disabled", true);
    $("#Maitre_Arbalettrier").attr('checked', false); 
  }     
}

//Mélée
function enable_palier2_Arme_Melee() {
    if (this.checked) {
    $("#Combat_arme_tranchante").prop("disabled", false);
    $("#Combat_arme_Contondante").prop("disabled", false);
    $("#Combat_arme_courte").prop("disabled", false);
    $("#Combat_arme_hast").prop("disabled", false);
  } else {
    $("#Combat_arme_tranchante").prop("disabled", true);
    $("#Combat_arme_tranchante").attr('checked', false); 

    $("#Combat_arme_Contondante").prop("disabled", true);
    $("#Combat_arme_Contondante").attr('checked', false); 

    $("#Combat_arme_courte").prop("disabled", true);
    $("#Combat_arme_courte").attr('checked', false); 

    $("#Combat_arme_hast").prop("disabled", true);
    $("#Combat_arme_hast").attr('checked', false); 

    //Master
    $("#Maitre_Combat_arme_tranchante").prop("disabled", true);
    $("#Maitre_Combat_arme_tranchante").attr('checked', false); 

    $("#Maitre_Combat_arme_Contondante").prop("disabled", true);
    $("#Maitre_Combat_arme_Contondante").attr('checked', false); 

    $("#Maitre_Combat_arme_courte").prop("disabled", true);
    $("#Maitre_Combat_arme_courte").attr('checked', false);

    $("#Maitre_Combat_arme_hast").prop("disabled", true);
    $("#Maitre_Combat_arme_hast").attr('checked', false); 
  }      
}

function enable_palier2_Arme_Melee_Combat_arme_tranchante() {
    if (this.checked) {
    $("#Maitre_Combat_arme_tranchante").prop("disabled", false);
  } else {
    $("#Maitre_Combat_arme_tranchante").prop("disabled", true);
    $("#Maitre_Combat_arme_tranchante").attr('checked', false); 
  }    
}

function enable_palier2_Arme_Melee_Combat_arme_Contondante() {
    if (this.checked) {
    $("#Maitre_Combat_arme_Contondante").prop("disabled", false);
  } else {
    $("#Maitre_Combat_arme_Contondante").prop("disabled", true);
    $("#Maitre_Combat_arme_Contondante").attr('checked', false); 
  }       
}

function enable_palier2_Arme_Melee_Combat_arme_courte() {
    if (this.checked) {
    $("#Maitre_Combat_arme_courte").prop("disabled", false);
  } else {
    $("#Maitre_Combat_arme_courte").prop("disabled", true);
    $("#Maitre_Combat_arme_courte").attr('checked', false); 
  }    
}

function enable_palier2_Arme_Melee_Combat_arme_hast() {
    if (this.checked) {
    $("#Maitre_Combat_arme_hast").prop("disabled", false);
  } else {
    $("#Maitre_Combat_arme_hast").prop("disabled", true);
    $("#Maitre_Combat_arme_hast").attr('checked', false); 
  }     
}