<?php

namespace App\Livewire\Admin\OurClients;

use Livewire\Component;
use App\Models\OurClient;
use Livewire\WithFileUploads;

class OurClientsUpdate extends Component
{
    use WithFileUploads;

    public $ourClient, $name, $description, $image, $current_image;

    protected $listeners = ['ourClientUpdate'];

    public function ourClientUpdate($id)
    {
        // Fill $ourClient with the eloquent model of the same id
        $this->ourClient = OurClient::find($id);
        $this->name = $this->ourClient->name;
        $this->description = $this->ourClient->description;
        $this->current_image = $this->ourClient->image;
        $this->resetValidation();
        
        // Show edit modal
        $this->dispatch('editModalToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:2',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        
        // Handle image upload
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('our-clients', $imageName, 'public');
            $data['image'] = 'storage/our-clients/' . $imageName;
        } else {
            // Keep the current image
            $data['image'] = $this->current_image;
        }
        
        // Update data in db
        $this->ourClient->update($data);
        
        // Hide modal
        $this->dispatch('editModalToggle');
        
        // Refresh data component
        $this->dispatch('refreshData')->to(OurClientsData::class);
    }

    public function render()
    {
        return view('admin.our-clients.our-clients-update');
    }
} 