<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\ChemicalExam;

//forms
use App\Livewire\Forms\clinicals\FormChemExam;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TClinicals\TChemExams;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class ChemicalExamComponent extends Component
{
    use Base;
    //traits
    use TChemExams;

    public $patient_uuid, $passObj, $entry=null, $data_type;

    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;
    
    //form bindings 
    public FormChemExam $form_d;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
        // Initialize the main form (which initializes the sub-form)
        $this->loadFormData();
        $this->form_d->entered_by = Auth::user()->name;
    }

    public function loadFormData()
    {
        if($this->entry === "insert")
        {
            $this->passObj = new ChemicalExam();
        }
        else {
            $this->setDate();
        }
    }

    public function render()
    {
        return view('livewire.ctms.patients.clinicals.chemical-exam-component');
    }

    public function fnChemExams()
    {
        $this->form_d->validate();
        $this->input = $this->form_d->all();
        $this->input = $this->sanitizeInput($this->input);
        $this->input['data_type'] = $this->data_type;
        //dd($this->input); // 
        $result = $this->saveChemExamData($this->input, $this->passObj);
        LivewireAlert::title('Chem Exam Data Saved...')->success()->asToast()->show();
        $msg = 'User ['.Auth::user()->name.'] saved Chem Exam Data ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
        $this->setDate();

    }

    public function setDate()
    {
        $this->passObj = ChemicalExam::where('patient_uuid', $this->patient_uuid)
                                        ->where('data_type', $this->data_type)
                                        ->first();
        $this->form_d->opd_id = $this->passObj->opd_id;
        $this->form_d->in_patient_id = $this->passObj->in_patient_id;
        $this->form_d->admission_date = $this->passObj->admission_date;

        $this->form_d->proteins = $this->passObj->proteins;
        $this->form_d->sugar = $this->passObj->sugar;
        $this->form_d->ketones = $this->passObj->ketones;
        $this->form_d->procalcitonin = $this->passObj->procalcitonin;
        $this->form_d->bile_salts = $this->passObj->bile_salts;
        $this->form_d->bile_pigments = $this->passObj->bile_pigments;

        $this->form_d->comment_entered_by = $this->passObj->comment_entered_by;
        $this->form_d->entered_by = $this->passObj->entered_by;
        $this->form_d->entry_date = $this->passObj->entry_date;

    }
}
