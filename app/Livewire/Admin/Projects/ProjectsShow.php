<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsShow extends Component
{
    public $project;

    protected $listeners = ['projectShow'];

    public function projectShow($id)
    {
        // fill $project with the eloquent model of the same id
        $this->project = Project::with('category', 'images')->find($id);
        // show show modal
        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.projects.projects-show');
    }
} 