<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    /**
     * @var Project
     */
    public $project;

    #[On('show')]
    public function show(Project $project = null)
    {
        $this->project = ($project) ?: new Project();
        $this->dispatch('openModal-' . $this->getId());
    }

    public function save()
    {
        $this->validate([
            'project.name' => 'required|string|max:255',
            'project.description' => 'required|string|max:255',
        ]);
        $this->project->save();
        $this->dispatch('closeModal');
        $this->dispatch('render');
    }

    #[On('delete')]
    public function delete(Project $project)
    {
        $project->delete();
        $this->reset('project');
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.projects.detail');
    }
}
