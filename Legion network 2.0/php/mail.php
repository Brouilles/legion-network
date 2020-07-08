<?php 
function postMail($dest, $msg, $title)
{
    $destinataire = $dest;
    $message = $msg;

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    //Date
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    $time = date("H");
    $minutes = date("i");

    $render = '<html><body>';
    $render .= '<div style="padding: 10px; background-color: #999; color: white; font-size: 16px; background-image: url(http://legion.verygames.net/legionnetwork/img/theme/boxBackground.png) repeat;';
    $render .= '<div style="text-align:center;"> <img alt="Legion" src="http://legion.verygames.net/wp-content/themes/Legionserveur/images/logo.png" style="height: 160px;"> </div>';
    $render .= $message;
    $render .= '</div>';
    $render .= '</body></html>';             

     mail($destinataire,  $title, "Envoyer par Légion serveur Minecraft le ".$day."/".$month."/".$year." à ".$time.":".$minutes." \n \n ".$render, $headers);
}
?>

