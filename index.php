<?php 
require 'tor_generator.php';

//ip

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

echo 'Mi ip: ' . $user_ip;
echo '<br />';
$contador = 3;
$detener = false;
while(($contador < (count($tor_ip)-1)) || $detener == true){

if($tor_ip[$contador] == $user_ip){
	echo '<br />';
	echo "RED TOR DETECTADA";
	echo '<br />';
	echo "ACCESO DENEGADO";
    echo '<br />';
    echo $user_ip;

	$detener = true;
    die();
	}else{

	echo $tor_ip[$contador] . " : " . $user_ip;
	echo '<br />';
}

	if(($contador == (count($tor_ip)-2)) && $detener == false){
		echo '<br />';
		echo "RED TOR NO DETECTADA";
	}

$contador++;

}
?>
