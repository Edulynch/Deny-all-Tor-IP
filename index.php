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
while($contador < (count($tor_ip)-1)){

if($tor_ip[$contador] == $user_ip){

	echo "RED TOR DETECTADA";
	echo '<br />';
	echo "ACCESO DENEGADO";
}else{
	echo $tor_ip[$contador] . " : " . $user_ip;
	echo '<br />';
}

$contador++;

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>