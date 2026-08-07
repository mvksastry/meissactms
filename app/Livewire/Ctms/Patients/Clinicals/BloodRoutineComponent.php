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
use App\Livewire\Forms\clinicals\FormBloodRoutine;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TBloodRoutine;
//use App\Traits\TCtms\TClinicalReportUploads;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class BloodRoutineComponent extends Component
{
    use Base;
    //traits
    use TBloodRoutine;
    //use TClinicalReportUploads;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    //form binding
    public FormBloodRoutine $form_a;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_a->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new BloodRoutine();
        }
        else {
            $this->setData();
        }
    }
    
    public function render()
    {
        return view('livewire.ctms.patients.clinicals.blood-routine-component');
    }

    public function fnBloodRoutine()
    {
        //dd($this->patient_uuid, $this->entry);
        $this->form_a->validate();
        $this->input = $this->form_a->all();
        $this->input = $this->sanitizeInput($this->input);
        //dd($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->patient_uuid, $this->form_a->opd_id, $this->input); // 
        $result = $this->saveBloodRoutineData($this->input, $this->passObj);
        LivewireAlert::title('Blood Routine Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Blood Routine Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setData();
    }

    public function setData()
    {
            $this->passObj = BloodRoutine::where('patient_uuid', $this->patient_uuid)
                                            ->where('data_type', $this->data_type)
                                            ->first();

            $this->form_a->opd_id = $this->passObj->opd_id;
            $this->form_a->in_patient_id = $this->passObj->in_patient_id;
            $this->form_a->admission_date = $this->passObj->admission_date;

            $this->form_a->rbc = $this->passObj->rbc;
            $this->form_a->hgb = $this->passObj->rbc;
            $this->form_a->hct = $this->passObj->hct;

            $this->form_a->mcv = $this->passObj->mcv;
            $this->form_a->mch = $this->passObj->mch;
            $this->form_a->mchc = $this->passObj->mchc;
            $this->form_a->rdw_sd = $this->passObj->rdw_sd;
            $this->form_a->rdw_cv = $this->passObj->rdw_cv;
            $this->form_a->plt = $this->passObj->plt;

            $this->form_a->pdw = $this->passObj->pdw;
            $this->form_a->mpv = $this->passObj->mpv;
            $this->form_a->plcr = $this->passObj->plcr;
            $this->form_a->pct = $this->passObj->pct;
            $this->form_a->wbc = $this->passObj->wbc;
            $this->form_a->plt = $this->passObj->plt;
            $this->form_a->neutrophils_abs = $this->passObj->neutrophils_abs;
            $this->form_a->neutrophils_percent = $this->passObj->neutrophils_percent;

            $this->form_a->lymph_abs = $this->passObj->lymph_abs;
            $this->form_a->lymph_percent = $this->passObj->lymph_percent;
            $this->form_a->mono_abs = $this->passObj->mono_abs;
            $this->form_a->mono_percent = $this->passObj->mono_percent;
            $this->form_a->eo_abs = $this->passObj->eo_abs;
            $this->form_a->eo_percent = $this->passObj->eo_percent;
            $this->form_a->baso_abs = $this->passObj->baso_abs;
            $this->form_a->baso_percent = $this->passObj->baso_percent;

            $this->form_a->ig_abs = $this->passObj->ig_abs;
            $this->form_a->ig_percent = $this->passObj->ig_percent;
            $this->form_a->observations = $this->passObj->observations;

            $this->form_a->comment_entered_by = $this->passObj->comment_entered_by;
            $this->form_a->entered_by = $this->passObj->entered_by;
            $this->form_a->entry_date = $this->passObj->entry_date;
    }
    
}
