<?php
date_default_timezone_set('UTC');

require_once "Game.php";
include_once 'firebaseConfig.inc.php';
require_once 'firebase/firebaseLib.php';

$firebaseConn = new firebase(FIREBASE_URL, FIREBASE_TOKEN);

//$firebaseConn->set("hackathon", "pepe1");
$date = Game::isToday() ? date("Ymd") : date("Ymd",strtotime("tomorrow"));

$response = $firebaseConn->get($date);
if($response==null){
	$response = "El sorteo del ".date("d/m/Y")." hs aun no ha comenzado";
}
echo $response;
?>