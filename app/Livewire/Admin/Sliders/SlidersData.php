<?php

namespace App\Livewire\Admin\Sliders;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithPagination;

class SlidersData extends Component
{

    use WithPagination;

    public $search, $status_filter = 'all';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    protected $listeners = ['refreshData' => '$refresh'];

    public function render()
    {
        $query = Slider::where('name', 'like', '%' . $this->search . '%');
        
        if ($this->status_filter === 'active') {
            $query->active();
        } elseif ($this->status_filter === 'inactive') {
            $query->inactive();
        }
        
        return view('admin.sliders.sliders-data', ['data' => $query->paginate(10)]);
    }

}