<?php

namespace App\Livewire\Admin\AboutUs;

use App\Models\AboutUs;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAboutUs extends Component
{
    use WithFileUploads;
    
    public $aboutUs;
    public $image;

    public function mount()
    {
        $this->aboutUs = AboutUs::find(1);
        if (!$this->aboutUs) {
            $this->aboutUs = new AboutUs();
        }
    }

    public function rules()
    {
        return [
            'aboutUs.title' => 'required|string|max:255',
            'aboutUs.description' => 'required|string',
            'aboutUs.mission' => 'nullable|string',
            'aboutUs.vision' => 'nullable|string',
            'aboutUs.values' => 'nullable|string',
            'aboutUs.years_experience' => 'nullable|integer|min:0',
            'aboutUs.projects_completed' => 'nullable|integer|min:0',
            'aboutUs.happy_clients' => 'nullable|integer|min:0',
            'aboutUs.is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $imageName, 'public');
            $data['aboutUs']['image'] = 'storage/images/' . $imageName;
        } else {
            // keep the old image if no new image uploaded
            unset($data['image']);
        }
        
        if ($this->aboutUs->exists) {
            $this->aboutUs->update($data['aboutUs']);
        } else {
            AboutUs::create($data['aboutUs']);
        }
        
        session()->flash('message', 'About Us Updated Successfully');
        $this->mount(); // Refresh data
    }

    public function render()
    {
        return view('admin.about-us.update-about-us');
    }
}
