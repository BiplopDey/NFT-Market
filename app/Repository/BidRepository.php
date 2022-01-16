<?php
namespace App\Repository;

class BidRepository{
    private $bidderId;
    private $bidderName;
    private $amount;
    private $currency;

    public function __construct( $bidderId, $bidderName, $amount, $currency) 
    {
       $this->bidderId = $bidderId;
       $this->bidderName = $bidderName;
       $this->amount = $amount;
       $this->currency = $currency;
    }


    public function getBidderId()
    {
        return $this->bidderId;
    }
    
    public function getBidderName()
    {
        return $this->bidderName;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

}