<?php

namespace App\Http\Livewire;

use App\Models\Instant;
use App\Services\LoveServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstantCard extends Component
{
    public $instant;
    
    public $user;
    public int $lovesCount;
    public bool $isInLove=false;
    public bool $hideCard=false;
    private  $loveService;
    /*
    public $image;
    public $title;
    */
    public function __construct()
    {
        $this->loveService = new LoveServices();
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->instant = Instant::find($this->instant->id);
        $this->lovesCount = $this->instant->lovesCount(); 

        $this->isInLove = $this->loveService->isInLove($this->user, $this->instant->id);
    }
    
    public function loveToggle()
    {
        $this->loveService->toggleLove($this->user, $this->instant->id);
        
        $this->isInLove = !$this->isInLove;
        $this->instant = Instant::find($this->instant->id);
        $this->lovesCount = $this->instant->lovesCount(); 
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
