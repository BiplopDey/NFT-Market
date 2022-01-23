<?php


namespace App\Src\Instant\Domain;


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
            throw new IdNotFound($id);
        }

        $this->id = $id;
    }
}
