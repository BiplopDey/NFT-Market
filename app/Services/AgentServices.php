<?php

namespace App\Services;

use App\Services\Agent\Agent;
use App\Services\Agent\Guest;
use Illuminate\Support\Facades\Auth;

class AgentServices{
    public static function getAgent(): Agent
    {
        if(!Auth::user()){
            return new Guest;
        }
        return Auth::user();
    }
}