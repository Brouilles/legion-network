<?

// -----------------------------------------

// décrypte une chaine (avec la même clé de cryptage)

// -----------------------------------------

function decrypter($maChaineCrypter){

$maCleDeCryptage="fjfhq44hfgs5";

if($maCleDeCryptage==""){

$maCleDeCryptage=$GLOBALS['PHPSESSID'];

}

$maCleDeCryptage = md5($maCleDeCryptage);

$letter = -1;

$newstr = '';

$maChaineCrypter = base64_decode($maChaineCrypter);

$strlen = strlen($maChaineCrypter);

for ( $i = 0; $i < $strlen; $i++ ){

$letter++;

if ( $letter > 31 ){

$letter = 0;

}

$neword = ord($maChaineCrypter{$i}) - ord($maCleDeCryptage{$letter});

if ( $neword < 1 ){

$neword += 256;

}

$newstr .= chr($neword);

}

return $newstr;

}

?>