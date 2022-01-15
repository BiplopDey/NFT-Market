<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoveServices{
    //we coul make and constructor and inject $user
    public function toggleLove($user, $instantId)
    {
        if(!$user) return;
        $user->loveToggle($instantId);
    }

    public function isInLove($user, $instantId): bool
    {
        return !$user ? false : $user->isInLove($instantId);
    }
}