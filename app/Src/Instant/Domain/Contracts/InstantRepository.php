<?php


namespace Src\Employee\Domain\Contracts;

use App\Src\Employee\Domain\InstantEntity;
use App\Src\Instant\Domain\InstantId;

interface EmployeeRepository
{
    public function search(InstantId $instantId): array;
    public function save(InstantEntity $instant): void;
}
