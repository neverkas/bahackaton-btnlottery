<?php
date_default_timezone_set('UTC');

class Game {

    const URL = "http://blockchain.info/address/";
    const ADDRESS = "1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw";
    const HOUR_OF_GAME = "16";
    const MINUTE_OF_GAME = "30";

    static function getBets(){
        $json = self::getWalletData();
        $startTime = self::getGameStartTime();
        $endTime = self::getGameTimeLimit();

        foreach($json->txs as $tx){
            if($tx->time > $endTime || $tx->time < $startTime){
                continue;
            }
            $txid = $tx->hash;
            $address = $tx->inputs[0]->prev_out->addr;
            $amount = 0;
            foreach($tx->out as $outTx){
                if($outTx->addr == self::ADDRESS){
                    $amount += $outTx->value;
                }
            }
            $bet = array(
                "txid" => $txid,
                "address" => $address,
                "amount"=> $amount,
                "number" => self::getNumberFromHash($txid)
            );
            $bets[] = $bet;
        }

        return $bets;
    }

    static function getGameTimeLimit(){
        $day = self::isToday() ? "today" : "tomorrow";
        $hour = self::HOUR_OF_GAME - 1;
        $time = $hour.":".self::MINUTE_OF_GAME.":00";
        return strtotime("$day $time");
    }

    static function getBlockTime(){
        $day = self::isToday() ? "today" : "tomorrow";
        $hour = self::HOUR_OF_GAME;
        $time = $hour.":".self::MINUTE_OF_GAME.":00";
        return strtotime("$day $time");
    }

    static function getLastBlockTime(){
        $day = self::isToday() ? "yesterday" : "today";
        $hour = self::HOUR_OF_GAME;
        $time = $hour.":".self::MINUTE_OF_GAME.":00";
        return strtotime("$day $time");
    }

    static function getGameStartTime(){
        $day = self::isToday() ? "yesterday" : "today";
        $hour = self::HOUR_OF_GAME -1;
        $time = $hour.":".self::MINUTE_OF_GAME.":00";
        return strtotime("$day $time");
    }

    static function getCurrentHour(){
        return date("H");
    }

    static function isToday(){
        return date("H") <= self::HOUR_OF_GAME  && date("i") <= self::MINUTE_OF_GAME;
    }

    static function getNumberFromHash($txid){
        $hash_to_number = CRC32($txid);
        $resto = abs($hash_to_number % 100);

        return $resto;
    }

    static function getHouseProfit(){

    }

    static function getDonationAmount(){

    }

    static function getPriceTotal(){
        
    }

    static function getBalance(){
        $data = self::getWalletData();
        return $data->final_balance;
    }

    static function getWalletData(){
        $bets = array();
        $url = self::URL . self::ADDRESS ."?format=json";
        $content = file_get_contents($url);
        $json = json_decode($content);

        return $json;
    }

    static function getWinningNumber(){
        $_json = file_get_contents("http://blockchain.info/blocks/0?format=json");
        $json = json_decode($_json);
        $blockTime = self::getLastBlockTime();

        if($json->blocks[0]->time < $blockTime){
            throw new Exception();
        }

        foreach($json->blocks as $i => $block){
            if($block->time < $blockTime && $i != 0){
                $nextBlock = $json->blocks[$i-1];
                $response = array(
                    "number"=>self::getNumberFromHash($nextBlock->hash),
                    "hash"=>$nextBlock->hash,
                    "height"=>$nextBlock->height
                );
                return $response;
            }
        }

        return 0;
    }

} 