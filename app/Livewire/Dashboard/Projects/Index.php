<?php

namespace App\Livewire\Dashboard\Projects;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[On('render')]
    public function render()
    {
        $projects = auth()->user()->projects()->latest()->paginate();

        return view('livewire.dashboard.projects.index', compact('projects'))
            ->title(__('My projects'))
            ->layoutData([
                'breadcrumb' => [
                    ['label' => __('My projects'), 'url' => route('projects')]
                ]
            ]);
    }
}
