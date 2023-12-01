<?php

namespace App\Livewire\Public\Components;

use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        $projects = \App\Models\Project::where('status', true)->latest()->paginate();

        return view('livewire.public.components.projects', compact('projects'));
    }
}
