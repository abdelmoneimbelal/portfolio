<?php

namespace App\Livewire\Admin\Sliders;

use Livewire\Component;
use App\Models\Slider;

class SlidersDelete extends Component
{
    public $slider;
    
    protected $listeners = ['sliderDelete'];

    public function sliderDelete($id)
    {
        // fill $slider with the eloquent model of the same id
        $this->slider = Slider::find($id);
        // show delete modal
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // delete record
        $this->slider->delete();
        $this->reset('slider');
        // hide modal
        $this->dispatch('deleteModalToggle');
        // refresh sliders data component
        $this->dispatch('refreshData')->to(SlidersData::class);
    }

    public function render()
    {
        return view('admin.sliders.sliders-delete');
    }
}