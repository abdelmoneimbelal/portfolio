<?php

namespace App\Livewire\Admin\OurClients;

use Livewire\Component;
use App\Models\OurClient;
use Livewire\WithPagination;

class OurClientsData extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['refreshData' => '$refresh'];

    public function render()
    {
        return view('admin.our-clients.our-clients-data', [
            'data' => OurClient::where('name', 'like', '%' . $this->search . '%')
                              ->paginate(10)
        ]);
    }
}
