<?php if($_SESSION['connect'] == 1 && $_SESSION['rank'] == 1 || $_SESSION['connect'] == 1 && $_SESSION['rank'] == 2)
 { ?> 
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
<?php }?>