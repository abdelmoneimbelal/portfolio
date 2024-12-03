<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsCreate extends Component
{
    public $skill;
    public function mount()
    {
        $this->skill = new Skill();
    }

    public function rules()
    {
        return [
            'skill.name' => 'required|string',
            'skill.progress' => 'required|numeric|min:1|max:100',
        ];
    }

    public function store()
    {
        $this->validate();
    }

    public function render()
    {
        return view('admin.skills.skills-create');
    }
}
