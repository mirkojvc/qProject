<?php

// File: app/View/Components/DynamicTable.php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class DynamicTable extends Component
{
    public $models;
    public $current_page;
    public $total_pages;
    public $actions;

    /**
     * Create a new component instance.
     *
     * @param Model|Collection $models
     */
    public function __construct($models, $currentPage = 1, $totalPages = 1, $actions = [])
    {
        $this->models = $models;
        $this->current_page = $currentPage;
        $this->total_pages = $totalPages;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dynamic-table');
    }
}
