<?php
date_default_timezone_set('UTC');

include_once 'firebaseConfig.inc.php';
require_once 'firebase/firebaseLib.php';

$firebaseConn = new firebase(FIREBASE_URL, FIREBASE_TOKEN);

//$firebaseConn->set("hackathon", "pepe1");

$response = $firebaseConn->get(date("Ymd"));
if($response==null){
	$response = "El sorteo del ".date("d/m/Y")." hs aun no ha comenzado";
}
echo $response;
?>