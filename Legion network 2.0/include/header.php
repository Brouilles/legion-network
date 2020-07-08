    <div class="header navbar navbar-inverse navbar-fixed-top">
        <ul class="nav nav-pills pull-right">
          <li><div class="btn-group" style="margin-top: 9px;"> 
                <a href="#" data-toggle="dropdown" style="background-color: rgba(0, 0, 0, 0.00);">Bibliothèque <span class="caret"></span></a>
                <ul class="borderLegion dropdown-menu">
                  <li><a href="dashboard.php">Règles</a></li>
                  <li><a href="profile.php">Histoire</a></li>
                  <li><a href="profile.php">Ajout inédit</a></li>
                </ul>
               </div>
          </li>
          <li><a href="article.php?id=1">Launcher</a></li>
          <li><a href="#">Calendrier</a></li>
          <?php if(isset($_SESSION['connect']) && $_SESSION['connect'] == 1)
          { ?> 
              <li><a href="#">|</a></li>
              <li><div class="btn-group" style="margin-top: 9px;"> 
                    <a href="#" data-toggle="dropdown" style="background-color: rgba(0, 0, 0, 0.00);"><?php echo $_SESSION['user'];?> <span class="caret"></span></a>
                    <ul class="borderLegion dropdown-menu">
                      <li><a href="dashboard.php">Accueil</a></li>
                      <li><a href="profile.php">Mon profil</a></li>
                    </ul>
                   </div>
              </li>
              <li><a href="php/connection/disconnect.php">Déconnexion</a></li>
          <?php
          }
          ?>
        </ul>
        <h3 class="text-muted">Légion Network</h3>
     </div> 

