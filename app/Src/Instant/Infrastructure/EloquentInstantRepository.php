<?php

declare(strict_types=1);

namespace App\Src\Instant\Infrastructure;

use App\Models\Instant;
use App\Src\Instant\Domain\Contracts\InstantRepository;
use App\Src\Instant\Domain\InstantEntity;
use App\Src\Instant\Domain\InstantId;
use Carbon\Carbon;
use Mockery;

final class EloquentInstantRepository implements InstantRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Instant();
    }

    public function search(InstantId $instantId): array
    {
        $data = $this->model->findOrFail($instantId->value())->toArray();
        $data['createdAtTimestamp'] = Carbon::parse($data['created_at'])->timestamp;
        $data['owner_id'] = (int) $data['user_id'];
        $data['loversCount'] = (int) $data['loversCount'];
        return $data;
    }

    public function save(InstantEntity $instantEntity): void
    {
        $data = $instantEntity->toArray();
                
        $instantToUpdate = Instant::findOrFail($data['id']);
        $dataUpdate = [
            'title' => $data['title'],
            'img' => $data['img'],
            'loversCount' => $data['loversCount']
        ];
        $instantToUpdate->update($data);
       //  dd($instantToUpdate->getAttributes());
        // $this->model->save();
        // dd(Instant::find($data['id']));
        
    }
}
