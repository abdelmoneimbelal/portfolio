<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Projects\ProjectsData;

class ProjectsCreate extends Component
{
    use WithFileUploads;

    public $name, $summary, $description, $link, $image, $category_id, $categories, $gallery_images = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'summary' => 'nullable|string|max:500',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'Category',
        ];
    }

    public function submit()
    {
        // Check if gallery images exceed limit
        if (!empty($this->gallery_images) && count($this->gallery_images) > 6) {
            session()->flash('error', 'Maximum 6 gallery images allowed.');
            return;
        }
        
        $data = $this->validate($this->rules(), [], $this->attributes());
        // save image on my project
        $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $imageName, 'public');
        // save data in db
        $data['image'] = 'storage/images/' . $imageName;
        $project = Project::create($data);
        
        // Save gallery images
        if (!empty($this->gallery_images)) {
            foreach ($this->gallery_images as $index => $galleryImage) {
                $galleryImageName = time() . '_' . $index . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->storeAs('images', $galleryImageName, 'public');
                
                $project->images()->create([
                    'image' => 'storage/images/' . $galleryImageName,
                    'sort_order' => $index
                ]);
            }
        }
        
        $this->reset(['name', 'summary', 'description', 'link', 'image', 'category_id', 'gallery_images']);
        // hide modal
        $this->dispatch('createModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }

    public function render()
    {
        return view('admin.projects.projects-create');
    }
}
