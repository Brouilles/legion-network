<?php if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 1 || $_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
 { ?> 
           <div class="col-md-3 content">
                <h3>Administrateur:</h3>
                <ol class="list-unstyled">
                  <li><a href="candidacyList.php">Liste des Candidature</a></li>
                  <li><a href="members.php"><span class="glyphicon glyphicon-th-list"></span> Liste des Membres</a></li>
                  <li><a href="character.php"><span class="glyphicon glyphicon-user"></span> Liste des Personnages RP</a></li>
                  <li><a href="articleList.php"><span class="glyphicon glyphicon-user"></span> Liste des Pages</a></li>
                  <li><a href="articleList.php"><span class="glyphicon glyphicon-user"></span> Liste des News</a></li>
                    <?php if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 2) {?>
                      <li><a href="option.php"><span class="glyphicon glyphicon-cog"></span> Option du network</a></li>
                    <?php } ?>
                  <li><a href="calendar.php">Calendrier (en cours...)</a></li>
                </ol>
            </div>
<?php }?>