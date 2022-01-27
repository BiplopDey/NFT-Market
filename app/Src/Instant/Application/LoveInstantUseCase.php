<?php

namespace App\Src\Instant\Application;

class LoveInstantUseCase{
    
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