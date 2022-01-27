<?php

declare(strict_types=1);

namespace App\Src\Instant\Application;

use App\Models\Instant;
use App\Src\Instant\Domain\Contracts\InstantRepository;
use App\Src\Instant\Domain\Exceptions\InstantNotFound;
use App\Src\Instant\Domain\InstantEntity;
use App\Src\Instant\Domain\InstantId;

final class FindInstantUseCase{

    public function __construct(private InstantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?InstantEntity
    {
        $response = $this->repository->search(new InstantId($id));
        $this->ensureExist($response);
        return InstantEntity::fromArray($response);
    }

    private function ensureExist(?array $data): void
    {
        if(empty($data)) throw new InstantNotFound("");
    }
}