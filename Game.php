<?php

class Game {

    const URL = "https://blockchain.info/address/";
    const ADDRESS = "1B12NKx9PRTtgXWvFdzD6ZgYrRMY4dCwQw";

    static function getBets(){
        $json = self::getWalletData();

        foreach($json->txs as $tx){
            $txid = $tx->hash;
            $address = $tx->inputs[0]->prev_out->addr;
            $amount = 0;
            foreach($tx->out as $outTx){
                if($outTx->addr == SELF::ADDRESS){
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

    public function getGameTimeLimit(){
        $time = strtotime("today at 6pm");
    }

    public function getGameStartTime(){
        $time = strtotime("yesterday at 6pm");
    }

    static function getNumberFromHash($txid){
        return $txid % 100;
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
        $url = self::URL . self::ADDRESS ." ?format=json";
        $content = file_get_contents($url);
        $json = json_decode($content);

        return $json;
    }

} 