<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\LiverFunction;

//forms
use App\Livewire\Forms\Clinicals\FormLiverFunction;

//traits
use App\Traits\TCtms\TClinicals\TLiverFunctions;

//logs
use Illuminate\Support\Facades\Log;

class LiverFunctions extends Component
{
    use TLiverFunctions;

    public $patient_uuid;
    
    public FormLiverFunction $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.liver-functions');
    }

    public function fnLiverFunction($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveLiverFunctionData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Liv function Data ['.$this->patient_uuid.']');
        //dd($result); //
    } 
}
