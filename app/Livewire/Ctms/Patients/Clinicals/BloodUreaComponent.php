<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodUrea;

//forms
use App\Livewire\Forms\Clinicals\FormBloodUrea;

//traits
use App\Traits\TCtms\TClinicals\TBloodUrea;

//logs
use Illuminate\Support\Facades\Log;

class BloodUreaComponent extends Component
{
    use TBloodUrea;

    public $patient_uuid;

    public FormBloodUrea $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-urea-component');
    }

    public function fnBloodUrea($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveBloodUreaData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Blood Urea Data ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
