<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\GeneralSummary;

//forms
use App\Livewire\Forms\Clinicals\FormGeneralSummary;

//traits
use App\Traits\TCtms\TClinicals\TGeneralSummary;

//logs
use Illuminate\Support\Facades\Log;

class GeneralSummaryComponent extends Component
{
    use TGeneralSummary;

    public $patient_uuid;

    public FormGeneralSummary $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.general-summary-component');
    }

    public function fnGeneralSummary($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveGenSummaryData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Gen Summary Data ['.$this->patient_uuid.']');
        //dd($result); //
    }
}
