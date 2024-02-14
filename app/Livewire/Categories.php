<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;


    public $search = '';
    public $name = '';
    public $icon = '';
    public $categories_id = 0;




    public function render()
    {
        $categories = Category::search($this->search)
            ->latest()
            ->paginate(5)
            ->withQueryString();


        return view('livewire.categories', compact('categories'));
    }



    public function edit($id)
    {



        $categories = Category::findOrFail($id);

        $this->categories_id = $categories->id;
        $this->name = $categories->name;
        $this->icon = $categories->icon;
    }




    public function delete($id)
    {
        if ($id) {
            Category::findOrFail($id)->delete();
            session()->flash('success', 'Kategori berhasil di hapus');
        }
    }
}
