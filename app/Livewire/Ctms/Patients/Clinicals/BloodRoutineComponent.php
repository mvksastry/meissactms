<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodRoutine;

//forms
use App\Livewire\Forms\Clinicals\FormBloodRoutine;

//traits
use App\Traits\TCtms\TClinicals\TBloodRoutine;

//logs
use Illuminate\Support\Facades\Log;

class BloodRoutineComponent extends Component
{
    //traits
    use TBloodRoutine;

    public $patient_uuid;

    //form binding
    public FormBloodRoutine $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-routine-component');
    }

    public function fnBloodRoutine($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveBloodRoutineData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Blood Routine Data ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
