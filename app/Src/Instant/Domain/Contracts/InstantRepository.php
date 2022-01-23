<?php


namespace App\Src\Instant\Domain\Contracts;

use App\Src\Instant\Domain\InstantEntity;
use App\Src\Instant\Domain\InstantId;

interface InstantRepository
{
    public function search(InstantId $instantId): array;
    public function save(InstantEntity $instant): void;
}
