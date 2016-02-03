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

echo '<b>Mi IP: </b>' . $user_ip;
echo '<br />';
$contador = 3;
$detener = false;
while(($contador < (count($tor_ip)-1)) || $detener == true){

if($tor_ip[$contador] == $user_ip){
	echo '<br />';
	echo '<b>RED TOR DETECTADA</b>';
	echo '<br />';
	echo "<b>ACCESO DENEGADO</b>";
    echo '<br />';
    echo $user_ip;

	$detener = true;
    die();
	}

	if(($contador == (count($tor_ip)-2)) && $detener == false){
		echo '<br />';
		echo "<b>RED TOR NO DETECTADA</b>";
	}

$contador++;

}
?>
