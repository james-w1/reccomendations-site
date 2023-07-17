<?php

namespace App\Http\Livewire;

use App\Models\Recommendation;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $searchResults;

    public function mount() {
        $this->searchResults = NULL;

        $this->updatedQuery("");
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function updatedQuery($search)
    {
        if (empty(trim($search))) {
            $this->searchResults = Recommendation::select('type')->distinct()->get(5);
        } else {
            $fuzzy = implode("%", str_split($search));
            $fuzzy = "%$fuzzy%";

            $this->searchResults = Recommendation::select('type')->distinct()->where('type', 'like', $fuzzy)->get();
        }
    }
}
