<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoriesCreate extends Component
{
    public $name;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:4|unique:categories,name',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in db
        Category::create($data);
        $this->reset(['name']);
        // hide modal
        $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }

    public function render()
    {
        return view('admin.categories.categories-create');
    }
}
