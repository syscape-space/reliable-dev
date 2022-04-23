<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class CategorySelector extends Component
{
    public $main_categories;
    public $sub_categories;
    public $selected_main_id;
    public $parent;
    public function mount($parent = null,$main_selected_id = null){
        $this->parent = $parent;
        $this->selected_main_id = $main_selected_id;
        $this->main_categories = Department::query()->whereNull('parent')->get();
        $this->sub_categories = $main_selected_id ? Department::query()->whereParent($main_selected_id)->get() : collect([]);
    }
    public function updated(){
        $this->sub_categories = Department::query()->whereParent($this->selected_main_id)->get();
    }
    public function render()
    {
        return view('livewire.category-selector');
    }
}
