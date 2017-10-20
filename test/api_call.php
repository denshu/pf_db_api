<?php
include_once '../api/1.0/utils.php';
header("Content-Type: application/json; charset=UTF-8");

extract($_POST);

if (!$token) {
	echo 'buddy, you need a token';
	exit;
}

$url = 'localhost/~denshuto/pf_db_api/api/1.0/';
$url .= $table . '?';

$end = Util::endKey($_POST);

foreach ($_POST as $param => $value) {
	if ($param != 'table' && $param != 'token' && $value) {
		$value = str_replace(" ", "%20", $value);
	 	$url .= $param . "=" . $value; 
		if ($end != $param){
		    $url .= '&'; // not the last element
		}
	}
}

// echo $url . "\n\n";

$ch = curl_init();
$headers = array(
    'Content-Type:application/json',
    'Authorization: Bearer '. $token
);
curl_setopt_array($ch, array(
	CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'cURL Request'
));

$resp = curl_exec($ch);

curl_close($ch);

echo $resp . "\n\n";