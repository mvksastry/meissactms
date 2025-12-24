<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Livewire\Forms\PatientForm;

//forms

//traits
use App\Traits\TCtms\TPatientPersonalInfo;
use App\Traits\TCtms\TDbEntries;

//logs
use Illuminate\Support\Facades\Log;

class PatientPersonal extends Component
{
    use TPatientPersonalInfo;
    use TDbEntries;

    //Form bindings
    public PatientForm $form;

    //data binding
    public $input;

        //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = null, $sysAlertWarning = null, $sysAlertInfo = null, $sysAlertDanger = null;
    public $comDanger = null, $comWarning = null, $comInfo = null, $comSuccess = null;
    //primary information 
    public $patient_id, $patient_uuid; 
    public $center_id, $ctarm_id, $opd_id, $in_patient_id, $admission_date;
    public $name, $nick_name, $alias_name, $gender, $date_of_birth, $age, $primary_phone_number, $alternate_phone_number;
    public $emergency_contact_name, $emergency_contact_phone, $alternate_contact_name, $alternate_contact_phone;
    public $height, $height_unit="centimeters", $weight, $weight_unit="kg", $bmi;
    public $consent_status, $consent_date, $consent_av, $consent_approval_date, $consent_approval_reference,$consent_approval_file;
    public $gen_surgical_info, $surgery_at_lumbar, $malignancies, $general_medical_history, $infections_suffered;
    public $general_inflammatory_diseases,$ankylosing_spondylosis,$rheumatoid_arthritis,$chronic_kidney_issues;
    public $chronic_liver_issues,$hiv,$aids,$hepatitis_b,$hepatitis_c,$diabetes_mellitus_self,$diabetes_mellitus_family;
    public $hypertension_self,$hypertension_family,$ihd_self,$ihd_family,$paralysis_self,$paralysis_family;
    public $consumption_non_tgp, $consumption_tobacco, $consumption_gutka, $consumption_pan,$anyother_habbits;
    public $past_complaints, $present_complaints, $past_medications, $present_medications, $addictive_substance_use;
    public $non_addictive_substance_use, $past_history, $notable_family_history, $before_problem_occupation;
    public $general_habits;

    public $comment_entered_by, $entered_by, $entry_date;

    public $form_header;

    public function mount($entered_by)
    {
        $this->form->entered_by = $entered_by;
        $this->form->entry_date = date('Y-m-d');
    }

    public function render()
    {   //$this->entered_by = Auth::user()->name;
        return view('livewire.ctms.patients.patient-personal');
    }

    public function fnSavePrimaryInfo()
    {
        $this->validate(); 
        $this->input = $this->form->all();
        //dd($this->input); // 
        $result = $this->savePatientInformation($this->input);
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] saved Patient Personal data');
        //dd($result);
    }
}
