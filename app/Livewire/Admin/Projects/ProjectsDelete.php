<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsDelete extends Component
{
    public $project;

    protected $listeners = ['projectDelete'];

    public function projectDelete($id)
    {
        // fill $project with the eloquent model of the same id
        $this->project = Project::find($id);
        // show delete modal
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // delete gallery images
        foreach ($this->project->images as $galleryImage) {
            if (file_exists($galleryImage->image)) {
                unlink($galleryImage->image);
            }
        }
        
        // delete main image
        if (file_exists($this->project->image)) {
            unlink($this->project->image);
        }
        
        // delete record
        $this->project->delete();
        $this->reset('project');
        // hide modal
        $this->dispatch('deleteModalToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }

    public function render()
    {
        return view('admin.projects.projects-delete');
    }
}
