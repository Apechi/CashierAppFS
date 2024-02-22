<?php

namespace App\Livewire\Types;

use App\Models\Category;
use App\Models\Type;
use Livewire\Component;

class Index extends Component
{

    public $name, $icon;
    public $category_id;


    public function resetField()
    {
        $this->name = '';
        $this->icon = '';
        $this->category_id = '';
    }




    public function render()
    {

        $types = Type::all();
        $categories = Category::pluck('name', 'id');

        return view('livewire.types.index', compact('types', 'categories'));
    }
}
