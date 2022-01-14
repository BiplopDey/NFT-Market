<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InstantCard extends Component
{
    public $instant;
    /*
    public $image;
    public $title;
    public 
    public function mount()
    {
        $instant
    }*/
    public function render()
    {
        return view('livewire.instant-card');
    }
}
