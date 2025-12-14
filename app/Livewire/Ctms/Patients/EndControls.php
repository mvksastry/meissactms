<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

use App\Models\Ctms\Patient;

   

class EndControls extends Component
{
    //data binding
    public $input;

    public $entered_by, $entry_date, $verified_by, $verified_date, $entry_sealed_by, $entry_sealed_date;

    public function render()
    {
        $this->entered_by = Auth::user()->name;
        return view('livewire.ctms.patients.end-controls');
    }
}
