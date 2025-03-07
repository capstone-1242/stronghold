<?php

namespace App\View\Components;

use App\Models\Tag;
use Illuminate\View\Component;

class FilterDropdown extends Component
{
    public $tags;
    public $selectedTags;

    public function __construct($tags, $selectedTags)
    {
        $this->tags = $tags;
        $this->selectedTags = $selectedTags;
    }

    public function render()
    {
        return view('components.filter-dropdown');
    }
}
