<?php

namespace App\Livewire\Admin\Sliders;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;

class SlidersCreate extends Component
{
    use WithFileUploads;
    
    public $name, $description, $image, $link, $is_active = true;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:4|unique:sliders,name',
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save image on my project
        $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $imageName, 'public');
        // save data in db
        $data['image'] = 'storage/images/' . $imageName;
        Slider::create($data);
        $this->reset(['name', 'description', 'image', 'link']);
        $this->is_active = true;
        // hide modal
        $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(SlidersData::class);
    }

    public function render()
    {
        return view('admin.sliders.sliders-create');
    }
}