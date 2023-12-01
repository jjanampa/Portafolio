<?php

namespace App\Livewire\Dashboard\Projects;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $openModal = false;
    /**
     * @var Project
     */
    public Project $project;

    public ProjectForm $form;

    public function mount()
    {
        $this->project = new Project();
    }

    #[On('show')]
    public function show(Project $project = null)
    {
        $this->project = ($project) ?: new Project();
        $this->form->setProject($this->project);
        $this->openModal = true;
        $this->dispatch('openModal-' . $this->getId(), project: $this->project);
    }

    public function save()
    {
        $this->form->save(auth()->user());
        $this->openModal = false;
        $this->dispatch('render');
    }

    #[On('delete')]
    public function delete(Project $project)
    {
        $project->delete();
        $this->project =  new Project();
        $this->form->setProject($this->project);
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.dashboard.projects.detail');
    }
}
