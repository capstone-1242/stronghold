<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectedFilters extends Component
{
    public $selectedTags;
    public $tags;

    /**
     * Create a new component instance.
     *
     * @param array $selectedTags
     * @param \Illuminate\Support\Collection $tags
     * @return void
     */
    public function __construct($selectedTags, $tags)
    {
        $this->selectedTags = $selectedTags;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.selected-filters');
    }
}
