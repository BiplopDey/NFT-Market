<?php

namespace App\Services\Agent;

interface Agent{
    public function isInLove($instantId): bool;
}