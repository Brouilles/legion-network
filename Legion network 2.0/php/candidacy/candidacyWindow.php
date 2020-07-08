<?php
function candidacyWindow($candidacyId, $adminMode, $skinHide = NULL)
{ 
    $value = AOF_getTableValue($GLOBALS['AOF_BDD_TABLE_LEGION_candidacy'], $candidacyId);
?>
    <div class="modal fade" id="modal<?php echo $value['id']; ?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Candidature de: <?php echo $value['minecraftpseudo']; ?></h4>
          </div>
          <div class="modal-body">
            <?php
                echo "<strong>Présentation IRL:</strong>"; echo "<br/>";
                echo Stripslashes($value['paragrapheIRL']);
                echo "<br/>"; echo "<br/>";
                echo "<strong>Général</strong>"; echo "<br/>";
                echo "Nom: ".$value['name'];
                echo "<br/>";
                echo "Prénom: ".$value['firstName'];
                echo "<br/>";
                echo "Age: ".$value['age'];
                echo "<br/>";
                echo "Ethnie: ";
                if($value['ethnie'] == 1)
                    echo "Infecté";
                else
                    echo "Humain";
                echo "<br/> <br/>";
                echo "<strong>Compétence:</strong>"; 
                echo "<br/>";

                $actualPoint = 0;
                $pointAttrib = 0;
                $compNumber = 0;

                if ($value['age'] < 3) {
                    $actualPoint = 0;
                }
                else if ($value['age'] >= 3 && $value['age'] < 8) {
                    $actualPoint = ($value['age'] * 2) - 3;
                }
                else if ($value['age'] >= 8 && $value['age'] < 30) {
                    $actualPoint = ($value['age'] * 4) - 3;
                }
                else if ($value['age'] >= 30) {
                    $actualPoint = 117;
                }

                $compValue = AOF_compareValueAndGetTableValueInverse($GLOBALS['AOF_BDD_TABLE_LEGION_character'], $value['poster_id'], "account_id");
                $bdd = AOF_connect();
                $replyAccountSkill = $bdd->query('SELECT * FROM legionCharacterAndSkill');
                while($dataAccountSkill = $replyAccountSkill->fetch())
                {
                    if($compValue['id'] == $dataAccountSkill['IdCharacter'])
                    {
                        $replySkill = $bdd->query('SELECT * FROM legionSkill');
                        while($dataSkill = $replySkill->fetch())
                        {
                            if($dataAccountSkill['IdSkill'] == $dataSkill['Id'])
                            {
                                $compNumber += 1;
                                echo $dataSkill['Name'].' : Id = '.$dataAccountSkill['IdSkill']."<br/>";
                            }
                        }
                     }
                }

                $actualPoint = $actualPoint + ($compNumber * -25) + 25;
                echo "<br/><strong>Points attribuer restant:".$actualPoint."</strong>";

                 if($skinHide == false || $skinHide == NULL)
                 {
                     echo "<br/>"; echo "<br/>"; 
                     echo "<strong>Skin Minecraft:</strong>"; ?>
                        <img alt="Skin" style="height: 100px;" src="http://legion.verygames.net/legionnetwork/skin/<?php echo $value['minecraftpseudo']; ?>.png">
                     <?php
                 }

                 echo "<br/>"; echo "<br/>"; 
                 echo "<strong>Présentation physique:</strong>"; echo "<br/>";
                 echo Stripslashes($value['paragraphePresentation']);

                 echo "<br/>"; echo "<br/>"; 
                 echo "<strong>Présentation Mental:</strong>"; echo "<br/>";
                 echo Stripslashes($value['paragraphePresentationMental']);

                 echo "<br/>";  echo "<br/>"; 
                 echo "<strong>Paragraphe RP:</strong>"; echo "<br/>";
                 echo Stripslashes($value['paragrapheRP']);

                 if($value['state'] == -1 || $value['state'] == 1)
                 {
                 ?>
                    <div style="border-top: 2px solid #e5e5e5; height: 3px; width: 100%;"></div>
                 <?php
                    echo "<strong>Commentaire de ".$value['modoTreatment'].":</strong> <br/>";
                    echo Stripslashes($value['modoComment']);
                 }
                 ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button> 
            <?php
            if(isset($_SESSION['connect']) && AOF_permissions(2, $_SESSION['rank']))
            { 
                if($adminMode == true)   
                {
            ?>
                <br/>Mode admin
            <?php
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
<?php
}
?>

