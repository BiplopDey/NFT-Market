<?php

namespace App\Services\Agent;

class Guest implements Agent{
    public function isInLove($instantId):bool
    {
        return false;
    }
}