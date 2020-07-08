<div id="footer" class="col-md-12" style="margin-top: 10px;">
    <?php 
    if(isset($_SESSION['connect']) && AOF_permissions(1, $_SESSION['connect']))
    {
        ?>
        <a href="contact.php" class="col-md-12">Contactez-nous</a>
        <?php
        }
    ?>
    <div class="col-md-2">LégionServeurRp © 2014</div>
    <a href="http://aubega.com/" class="col-md-2"> <img alt="Aubega" src="img/aubegaWhite.png"> </a>
    <a href="http://yourphotodropper.aubega.com/" class="col-md-2"> <img  style="height: 48px;" alt="YourPhotoDropper" src="http://yourphotodropper.aubega.com/img/YouPhotoDropper.png" > </a><br/>
</div>