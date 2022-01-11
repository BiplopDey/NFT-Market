<?php

namespace App\Http\Livewire;

use App\Models\Instant;
use Livewire\Component;

class InstantsList extends Component
{
    public $instants;
    public function __construct() {
        $this->instants = Instant::all();
    }
    public function delete($instantId)
    {
        Instant::destroy($instantId);
        $this->instants = Instant::all();
    }
    public function render()
    {
        return view('livewire.instants-list');
    }
}
