<?php

namespace App\Livewire\EHub;

use Livewire\Component;




class ActivitiesHome extends Component
{
    public $activities;
    
    public function render()
    {
        return view('livewire.e-hub.activities-home');
    }
}
