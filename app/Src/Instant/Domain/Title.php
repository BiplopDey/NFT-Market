<?php

declare(strict_types=1);

namespace App\Src\Instant\Domain;

use App\Src\Instant\Domain\Exceptions\IncorrectTitle;

final class Title
{
    
    private $title;

    public function __construct(string $title)
    {
        $this->setTitle($title);
    }

    public function value(): string
    {
        return $this->title;
    }

    private function setTitle(string $title): void
    {
        if (empty($title))  throw new IncorrectTitle("");    
        
        $this->title = $title;
    }
}
