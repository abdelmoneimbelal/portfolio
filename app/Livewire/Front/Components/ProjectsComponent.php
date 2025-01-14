<?php

namespace App\Livewire\Front\Components;

use App\Models\Project;
use Livewire\Component;
use App\Models\Category;

class ProjectsComponent extends Component
{
    public function render()
    {
        return view('front.components.projects-component', [
            'projects' => Project::all(),
            'categories' => Category::all(),
        ]);
    }
}
