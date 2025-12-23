<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\UrineRoutine;

//forms
use App\Livewire\Forms\Clinicals\FormUrineRoutine;

//traits
use App\Traits\TCtms\TClinicals\TUrineRoutine;

//logs
use Illuminate\Support\Facades\Log;

class UrineRoutineComponent extends Component
{
    use TUrineRoutine;

    public $patient_uuid;

    public FormUrineRoutine $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.urine-routines-component');
    }

    public function fnRenalFunction($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveUrineRoutineData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Urine Data ['.$this->patient_uuid.']');
        //dd($result); //
    } 
}
