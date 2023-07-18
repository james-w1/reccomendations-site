<?php

namespace App\Http\Livewire;

use App\Models\Recommendation;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $searchResults;
    public $selected;

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

    public function selectResult($result)
    {
        $this->selected = Recommendation::where('type', '=', $result)->get();
    }

    public function back()
    {
        $this->query = $this->selected->first()->type;
        $this->updatedQuery($this->query);
        $this->selected = NULL;
    }

    public function clear()
    {
        $this->query = "";
        $this->updatedQuery($this->query);
        $this->selected = NULL;
    }
}
