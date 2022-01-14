<?php

namespace App\Http\Livewire;

use App\Models\Instant;
use App\Services\LoveServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InstantsList extends Component
{
    public $instants;

    public function mount() 
    {
        $this->instants = Instant::all();
    }
    
    /*
    public function delete($instantId)
    {
        Instant::destroy($instantId);
        $this->instants = Instant::all();
    }

    public function love($instantId)
    {
        $loveService = new LoveServices();
        $loveService->toggleLove(Auth::user(), $instantId);
        $this->instants = Instant::all();
    }
    */
    
    public function render()
    {
        return view('livewire.instants-list');
    }
}
