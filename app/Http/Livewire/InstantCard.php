<?php

namespace App\Http\Livewire;

use App\Models\Instant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstantCard extends Component
{
    public $instant;
    public bool $isInLove;
    public bool $hideCard;

    /*
    public $image;
    public $title;
    */
    public function mount()
    {
        $this->isInLove = Auth::user()->isInLove($this->instant);
        $this->hideCard = false;
    }
    
    public function delete()
    {
        Instant::destroy($this->instant->id);
        $this->hideCard = true;
    }

    public function render()
    {
        return $this->hideCard ? <<<'blade'
                                        <div>
                                        </div>
                                    blade : 
                                    view('livewire.instant-card');
    }
}
