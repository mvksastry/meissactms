<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\BloodSugar;

//forms
use App\Livewire\Forms\Clinicals\FormBloodSugar;

//traits
use App\Traits\TCtms\TClinicals\TBloodSugar;

//logs
use Illuminate\Support\Facades\Log;

class BloodSugarComponent extends Component
{
    use TBloodSugar;

    public $patient_uuid;
    
    public FormBloodSugar $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-sugar-component');
    }

    public function fnBloodSugar($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveBloodSugarData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Blood Sugar Data ['.$this->patient_uuid.']');
        //dd($result); //
    }


}
