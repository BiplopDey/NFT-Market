<?php

declare(strict_types=1);
namespace App\Src\Instant\Domain;

use App\Src\Instant\Domain\Exceptions\IdNotFound;

final class InstantId
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->setId($id);
    }

    public function value()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        if ($id < 0) {
            throw new IdNotFound("Invalid id: ".$id);
        }

        $this->id = $id;
    }
}
