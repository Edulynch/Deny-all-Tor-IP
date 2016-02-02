
<?php 
require 'tor_generator.php';

echo 'tor ip: ' . $tor_ip[5];
echo '<br />';
echo 'Mi ip: ' .$_SERVER['REMOTE_ADDR'];
echo '<br />';
if($tor_ip[5] == $_SERVER['REMOTE_ADDR']){

	echo "RED TOR DETECTADA";
	echo '<br />';
	echo "ACCESO DENEGADO";
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