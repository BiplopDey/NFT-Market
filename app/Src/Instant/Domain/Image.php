<?php

declare(strict_types=1);

namespace App\Src\Instant\Domain;

use App\Src\Instant\Domain\Exceptions\IncorrectImage;

final class Image
{
    private $image;

    public function __construct(string $image)
    {
        $this->setImage($image);
    }

    public function value(): string
    {
        return $this->image;
    }

    private function setImage(string $image): void
    {
        if (empty($image))  throw new IncorrectImage("");    
        
        $this->image = $image;
    }
}
