<?php

namespace App\Livewire\Ctms\Patients\Decision;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms

//traits
use App\Traits\Base;
use Livewire\WithFileUploads;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class EnrollmentDecisionComponent extends Component
{
    use Base;
    use WithFileUploads;

    //form status
    public $data_type = null;
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    //new paitent global uuid
    public $patient_uuid, $entry="update", $confirmed_patients;

    public function render()
    {
        return view('livewire.ctms.patients.decision.enrollment-decision-component');
    }
}
