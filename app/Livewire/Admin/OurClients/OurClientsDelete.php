<?php

namespace App\Livewire\Admin\OurClients;

use Livewire\Component;
use App\Models\OurClient;

class OurClientsDelete extends Component
{
    public $ourClient;
    
    protected $listeners = ['ourClientDelete'];

    public function ourClientDelete($id)
    {
        // Fill $ourClient with the eloquent model of the same id
        $this->ourClient = OurClient::find($id);
        
        // Show delete modal
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // Delete record
        $this->ourClient->delete();
        $this->reset('ourClient');
        
        // Hide modal
        $this->dispatch('deleteModalToggle');
        
        // Refresh data component
        $this->dispatch('refreshData')->to(OurClientsData::class);
    }

    public function render()
    {
        return view('admin.our-clients.our-clients-delete');
    }
} 