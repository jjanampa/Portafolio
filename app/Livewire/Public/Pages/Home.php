<?php

namespace App\Livewire\Public\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.public.pages.home')->layout('layouts.public');
    }
}
