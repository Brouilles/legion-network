<?

// -----------------------------------------

// crypte une chaine (via une clé de cryptage)

// -----------------------------------------

function crypter($maChaineACrypter){

$maCleDeCryptage="fjfhq44hfgs5";

if($maCleDeCryptage==""){

$maCleDeCryptage=$GLOBALS['PHPSESSID'];

}

$maCleDeCryptage = md5($maCleDeCryptage);

$letter = -1;

$newstr = '';

$strlen = strlen($maChaineACrypter);

for($i = 0; $i < $strlen; $i++ ){

$letter++;

if ( $letter > 31 ){

$letter = 0;

}

$neword = ord($maChaineACrypter{$i}) + ord($maCleDeCryptage{$letter});

if ( $neword > 255 ){

$neword -= 256;

}

$newstr .= chr($neword);

}

return base64_encode($newstr);

}

?>