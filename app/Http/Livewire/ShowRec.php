<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowRec extends Component
{
    public $rec;

    public function render()
    {
        return view('livewire.show-rec');
    }
}
