<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\Creatinine;

//forms
use App\Livewire\Forms\Clinicals\FormCreatinine;

//traits
use App\Traits\TCtms\TClinicals\TCreatinine;

//logs
use Illuminate\Support\Facades\Log;

class CreatinineComponent extends Component
{
    //traits
    use TCreatinine;

    public $patient_uuid;

    //models
    public FormCreatinine $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.creatinine-component');
    }

    public function fnCreatinine($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveCreatinineData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Creatinine Data ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
