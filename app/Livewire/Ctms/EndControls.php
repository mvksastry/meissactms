<?php

namespace App\Livewire\Ctms;

use Livewire\Component;

class EndControls extends Component
{
    //Common to all panels;
    public $entered_by, $entry_date, $verified_by, $verified_date, $entry_sealed_by, $entry_sealed_date;

    public function render()
    {
        return view('livewire.ctms.end-controls');
    }
}
