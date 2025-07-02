<?php

namespace App\Livewire\Admin\Sliders;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;

class SlidersUpdate extends Component
{
    use WithFileUploads;
    
    public $slider, $name, $description, $image, $link, $is_active = true;

    protected $listeners = ['sliderUpdate'];

    public function mount()
    {
        $this->is_active = true;
    }

    public function sliderUpdate($id)
    {
        // fill $slider with the eloquent model of the same id
        $this->slider = Slider::find($id);
        $this->resetExcept('slider');
        $this->name = $this->slider->name;
        $this->description = $this->slider->description;
        $this->link = $this->slider->link;
        $this->is_active = (bool) $this->slider->is_active;
        $this->resetValidation();
        // show edit modal
        $this->dispatch('editModalToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:4|unique:sliders,name,' . $this->slider->id,
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'is_active' => 'boolean',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save image on my project if new image uploaded
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $imageName, 'public');
            $data['image'] = 'storage/images/' . $imageName;
        } else {
            // keep the old image if no new image uploaded
            unset($data['image']);
        }
        // ensure is_active is boolean
        $data['is_active'] = (bool) $this->is_active;
        // save data in db
        $this->slider->update($data);
        // hide modal
        $this->dispatch('editModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(SlidersData::class);
    }

    public function render()
    {
        return view('admin.sliders.sliders-update');
    }
}