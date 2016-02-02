<?php 

//directory
$path_url = '/tor_access/';
$pagina_ip = $_SERVER['SERVER_ADDR'];

$tor_ip = file_get_contents('https://check.torproject.org/cgi-bin/TorBulkExitList.py?ip='. $pagina_ip, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

//convert String to array
$tor_ip = explode("\n",$tor_ip);

$results = '';

//$tor_ip[0,1,2] = comments
//$tor_ip[counter($tor_ip)-1] = ' '
//$tor_ip[counter($tor_ip)-2] = last ip
for ($i=3; $i < (count($tor_ip)-1); $i++) { 
	$results = $results .= "$tor_ip[$i] \n";
}

//$results = 	trim($results);
$results = print_r($results, true);
$results = str_replace(' ', ' deny', $results);

if(!empty($results)){
	file_put_contents('blacklist.txt', $results);
	header('location: ' . $path_url . 'blacklist.txt');
}

?>