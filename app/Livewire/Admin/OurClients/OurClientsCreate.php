<?php

namespace App\Livewire\Admin\OurClients;

use Livewire\Component;
use App\Models\OurClient;
use Livewire\WithFileUploads;

class OurClientsCreate extends Component
{
    use WithFileUploads;

    public $name, $description, $image;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:2',
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        
        // Handle image upload
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/our-clients', $imageName);
            $data['image'] = 'storage/our-clients/' . $imageName;
        }
        
        // Save data in db
        OurClient::create($data);
        $this->reset(['name', 'description', 'image']);
        
        // Hide modal
        $this->dispatch('createModalToggle');
        
        // Refresh data component
        $this->dispatch('refreshData')->to(OurClientsData::class);
    }

    public function render()
    {
        return view('admin.our-clients.our-clients-create');
    }
}
