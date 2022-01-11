<?php

namespace App\Services;

class LoveServices{
    //we coul make and constructor and inject $user
    public function toggleLove($user, $instantId)
    {
       $user->loveToggle($instantId);
    }
}