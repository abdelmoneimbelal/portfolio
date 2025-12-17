<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Projects\ProjectsData;

class ProjectsUpdate extends Component
{
    use WithFileUploads;

    public $project, $name, $summary, $description, $link, $image, $category_id, $categories, $gallery_images = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    protected $listeners = ['projectUpdate'];

    public function projectUpdate($id)
    {
        // fill $project with the eloquent model of the same id
        $this->project = Project::find($id);
        $this->name = $this->project->name;
        $this->summary = $this->project->summary;
        $this->description = $this->project->description;
        $this->link = $this->project->link;
        $this->category_id = $this->project->category_id;
        $this->resetValidation();
        // show edit modal
        $this->dispatch('editModalToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            // 'name' => 'required|string|unique:projects,name,' . $this->project?->id,
            'summary' => 'nullable|string|max:500',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
        // check if project has image -> delete previous image -> save new image
        if ($this->image) {
            unlink($this->project->image);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $imageName, 'public');
            $data['image'] = 'storage/images/' . $imageName;
        } else {
            unset($data['image']);
        }
        
        // Save gallery images if new ones are uploaded
        if (!empty($this->gallery_images)) {
            // Delete existing gallery images
            foreach ($this->project->images as $existingImage) {
                if (file_exists($existingImage->image)) {
                    unlink($existingImage->image);
                }
            }
            $this->project->images()->delete();
            
            // Save new gallery images
            foreach ($this->gallery_images as $index => $galleryImage) {
                $galleryImageName = time() . '_' . $index . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->storeAs('images', $galleryImageName, 'public');
                
                $this->project->images()->create([
                    'image' => 'storage/images/' . $galleryImageName,
                    'sort_order' => $index
                ]);
            }
        }
        
        // save data in db
        $this->project->update($data);
        // hide modal
        $this->dispatch('editModalToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }

    public function render()
    {
        return view('admin.projects.projects-update');
    }
}
