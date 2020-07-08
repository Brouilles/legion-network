<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Aubega Open Framework</title>
    </head>

<body style="background-color: #f1f1f1;">
    <div style="width: 800px; border: 1px solid rgb(204, 204, 204); color: #343434; margin-top: 60px; margin-bottom: 30px; background-color: #fff; padding: 28px; border-radius: 13px;">
         <div id="content" style="font-family: 'Lucida Sans Unicode', Arial, Verdana, sans-serif;">
            <h1 style="color: #939598;"><strong>Aubega Open Framework</strong> - About</h1>
             <div style="background-color: #00b4f8; height: 3px; width: 100%;"></div>

             <p>
                 <?php
                    echo "<h3>Host</h3>";
                    echo "WebSite name: ".$GLOBALS['AOF_HOST_name'];

                    echo "<h3>Aubega Open Framework</h3>";
                    echo "Version: ".$GLOBALS['AOF_version'];

                    echo "<h3>BDD</h3>";
                    echo "Account Table: ".$GLOBALS['AOF_BDD_TABLE_account'];
                 ?>
             </p>

             <a href="http://www.aubega.com/"><img src="http://www.aubega.com/img/aubega/FlatStyleLittle.png" alt="Aubega" style="margin-bottom: 80px;"></a>
             <img src="http://boomshadow.net/wp-content/uploads/2012/11/mysql-logo.png" alt="MySQL">
         </div>  
    </div> 
</body>
</html>
