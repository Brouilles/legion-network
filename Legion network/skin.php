<?php
//Change earthiverse in the line below to the default user you want to show
if(isset($_GET['user'])) $user = htmlentities($_GET['user'],ENT_QUOTES); else $user = "player";

//Default skin in images/char.png
$default_skin = imagecreatefrompng('images/char.png');
//Grab skin from minecraft servers
$user_skin = imagecreatefrompng('skin/'.$user.'.png');

//Paste the default skin, then the new skin (if it exists) overtop. If it doesn't, it just returns the default skin.
$temp = imagecreatetruecolor(64,32);
imagealphablending($temp, false);
imagesavealpha($temp, true);
imagecopy($temp, $default_skin, 0, 0, 0, 0, 64, 32);
imagecopy($temp, $user_skin, 0, 0, 0, 0, 64, 32);
header('Content-type: image/png');
imagepng($temp);
imagedestroy($temp);
?>