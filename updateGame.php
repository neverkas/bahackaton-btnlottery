<?php
date_default_timezone_set('UTC');
require_once "Game.php";

$time = time();
if($time > Game::getGameTimeLimit()){
    Game::newGame();
}