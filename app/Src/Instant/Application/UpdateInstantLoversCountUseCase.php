<?php

namespace App\Src\Instant\Application;

use App\Src\Instant\Domain\Contracts\InstantRepository;

final class UpdateInstantLoversCountUseCase{
    
    private FindInstantUseCase $finder;
    private InstantRepository $repository;
    
    public function __construct(InstantRepository $repository)
    {
        $this->repository = $repository;
        $this->finder = new FindInstantUseCase($this->repository);
    }

    public function execute(int $id, int $loversCount):void
    {
        $instant = $this->finder->execute($id);
        $instant->updateLoversCount($loversCount);
       
        $this->repository->save($instant);
    }
}