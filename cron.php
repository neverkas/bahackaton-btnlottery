<?php
require_once 'Game.php';
include_once 'firebaseConfig.inc.php';
require_once 'firebase/firebaseLib.php';

$bets = Game::getBets();
$bets = $bets;
$date = Game::isToday() ? date("Ymd") : date("Ymd",strtotime("tomorrow"));


$firebaseConn = new firebase(FIREBASE_URL, FIREBASE_TOKEN);

/*$resp = $firebaseConn->get(date("YmdH"));
if ($resp==''){
	echo "SET";*/
	$response = $firebaseConn->set($date, $bets);
/*}
else{
	echo "UPDATE";
	$response = $firebaseConn->update(date("YmdH"), $bets);
}*/

echo "-><pre>"; print_r(json_decode($firebaseConn->get($date))); echo "</pre><-";


//echo "<pre>"; print_r(unserialize($response)); echo "</pre>";
?>