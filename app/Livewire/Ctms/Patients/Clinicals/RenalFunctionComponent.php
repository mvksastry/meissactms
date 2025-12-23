<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\RenalFunction;

//forms
use App\Livewire\Forms\Clinicals\FormRenalFunction;

//traits
use App\Traits\TCtms\TClinicals\TRenalFunctions;

//logs
use Illuminate\Support\Facades\Log;

class RenalFunctionComponent extends Component
{
    use TRenalFunctions;

    public $patient_uuid;

    public FormRenalFunction $form;

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.renal-function-component');
    }

    public function fnRenalFunction($input)
    {
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->saveRenalFunctionsData($this->input);
        Log::channel('patient')->info('User ['.Auth::user()->name.'] saved Renal Fn Data ['.$this->patient_uuid.']');
        //dd($result); //
    } 
}
