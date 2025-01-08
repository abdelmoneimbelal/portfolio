<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoriesUpdate extends Component
{
    public $category, $name;

    protected $listeners = ['categoryUpdate'];

    public function categoryUpdate($id)
    {
        // fill $category with the eloquent model of the same id
        $this->category = Category::find($id);
        $this->name = $this->category->name;
        $this->resetValidation();
        // show edit modal
        $this->dispatch('editModalToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:4|unique:categories,name,' . $this->category->id,
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in db
        $this->category->update($data);
        // hide modal
        $this->dispatch('editModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }

    public function render()
    {
        return view('admin.categories.categories-update');
    }
}
