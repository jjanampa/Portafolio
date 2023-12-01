<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{

    public ?Project $project;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required|min:5')]
    public $description = '';

    public $status = true;

    public $image;

    public function setProject(?Project $project = null)
    {
        $this->project = new Project();
        if ($project) {
            $this->name = $project->name;
            $this->description = $project->description;
            $this->status = $project->status;
            $this->project = $project;
        }
    }


    public function save(User $user)
    {
        $rules = $this->getRules();
        if (!$this->project->id) {
            $rules['image'] = 'required|image';
        }

        $this->validate($rules);

        $this->project->name = $this->name;
        $this->project->description = $this->description;
        $this->project->status = $this->status;

        if ($this->image) {
            $this->project->image = $this->image->store('projects', 'public');
        }
        $user->projects()->save($this->project);
        $this->reset(['name', 'description', 'status', 'image']);
    }

}
