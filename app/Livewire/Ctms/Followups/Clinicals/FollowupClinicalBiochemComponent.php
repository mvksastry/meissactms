<?php

namespace App\Livewire\Ctms\Followups\Clinicals;

use Livewire\Component;

use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
//models
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\Clinicals\BloodRoutine;
use App\Models\Ctms\Clinicals\BloodSugar;
use App\Models\Ctms\Clinicals\BloodUrea;
use App\Models\Ctms\Clinicals\ChemicalExam;
use App\Models\Ctms\Clinicals\Creatinine;
use App\Models\Ctms\Clinicals\Crp;
use App\Models\Ctms\Clinicals\DrugCategory;
use App\Models\Ctms\Clinicals\DrugDetails;
use App\Models\Ctms\Clinicals\Electrolytes;
use App\Models\Ctms\Clinicals\GeneralSummary;
use App\Models\Ctms\Clinicals\Il6;
use App\Models\Ctms\Clinicals\LaboratoryExam;
use App\Models\Ctms\Clinicals\LiverFunction;
use App\Models\Ctms\Clinicals\MicroscopicExam;
use App\Models\Ctms\Clinicals\RenalFunction;
use App\Models\Ctms\Clinicals\UrineRoutine;

//form objects
use App\Livewire\Forms\PatientCIForm;
use App\Livewire\Forms\clinicals\FormBloodRoutine;
use App\Livewire\Forms\clinicals\FormBloodSugar;
use App\Livewire\Forms\clinicals\FormBloodUrea;
use App\Livewire\Forms\clinicals\FormChemExam;
use App\Livewire\Forms\clinicals\FormCreatinine;
use App\Livewire\Forms\clinicals\FormCrp;
use App\Livewire\Forms\clinicals\FormElectrolytes;
use App\Livewire\Forms\clinicals\FormGeneralSummary;
use App\Livewire\Forms\clinicals\FormIl6;
use App\Livewire\Forms\clinicals\FormLabExams;
use App\Livewire\Forms\clinicals\FormLiverFunction;
use App\Livewire\Forms\clinicals\FormMicroscopicExam;
use App\Livewire\Forms\clinicals\FormRenalFunction;
use App\Livewire\Forms\clinicals\FormUrineRoutine;




//traits
use App\Traits\TCtms\TPatientClinicalData;
//logs
use Illuminate\Support\Facades\Log;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class FollowupClinicalBiochemComponent extends Component
{
   //Trait
    use TPatientClinicalData;

    public $input;

    //panels
    public $sys_panel, $msg_panel;

    //Form bindings
    public PatientCIForm $form;
    public FormBloodRoutine $form_a;
    public FormBloodSugar $form_b;
    public FormBloodUrea $form_c;
    public FormChemExam $form_d;
    public FormCreatinine $form_e;
    public FormCrp $form_f;
    public FormElectrolytes $form_g;
    public FormGeneralSummary $form_h;
    public FormIl6 $form_i;
    public FormLabExams $form_j;
    public FormLiverFunction $form_k;
    public FormMicroscopicExam $form_l;
    public FormRenalFunction $form_m;
    public FormUrineRoutine $form_n;


    //global patient uuid
    public $patient_uuid; 
    public $data_type, $entry="";

    public $discharge_report, $discharge_report_file;

    //Biochemical investigations
    public $admission_date, $in_patient_id;
    public $oande, $pr, $temperature, $bp_systolic, $bp_diastolic, $cvs, $panda, $cns;
    public $cbc, $esr, $crp, $rft, $lft, $clotting_time, $bleeding_time, $prothrombin_time, $procalcitonin, $lab_report_file;
    public $drug_details = [];
    public $drug_categories = [];
    public $c15Obj = [];

    //panels
    public $p1 = true, $p2 = true, $p3 = true, $p4 = true, $p5 = true; 

    //Common to all panels;
    public $entered_by, $entry_date, $verified_by, $verified_date, $entry_sealed_by, $entry_sealed_date;

    public $logged_user, $passObj;

    public function mount($patient_uuid, $data_type)
    {
        //dd($patient_uuid);
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
       
        $passObj = Patient::where('patient_uuid', $this->patient_uuid)->first();
        //$this->form->opd_id = $passObj->opd_id;
        //$this->form->in_patient_id = $passObj->in_patient_id;
        //$this->form->admission_date = $passObj->admission_date;
        $this->form->entered_by = $passObj->entered_by;
        $this->form->entry_date = date('Y-m-d');
        //dd($passObj, $this->form);
        
    }

    public function render()
    {
        return view('livewire.ctms.followups.clinicals.followup-clinical-biochem-component');
    }

    public function setPatientDataType()
    {
        $this->input['patient_uuid'] = $this->patient_uuid;
        $this->input['data_type'] = $this->data_type;
        //$this->input['entered_by'] = Auth::user()->name;
        //$this->input['entry_date'] = date('Y-m-d');

        //why not set form object entered_by and date here?
        $this->form_a->entered_by = Auth::user()->name;
        $this->form_b->entered_by = Auth::user()->name;
        $this->form_c->entered_by = Auth::user()->name;
        $this->form_d->entered_by = Auth::user()->name;
        $this->form_e->entered_by = Auth::user()->name;
        $this->form_f->entered_by = Auth::user()->name;
        $this->form_g->entered_by = Auth::user()->name;
        $this->form_h->entered_by = Auth::user()->name;
        $this->form_i->entered_by = Auth::user()->name;
        $this->form_j->entered_by = Auth::user()->name;
        $this->form_k->entered_by = Auth::user()->name;
        $this->form_l->entered_by = Auth::user()->name;
        $this->form_m->entered_by = Auth::user()->name;
        $this->form_n->entered_by = Auth::user()->name;

        $this->form_a->entry_date = date('Y-m-d');
        $this->form_b->entry_date = date('Y-m-d');
        $this->form_c->entry_date = date('Y-m-d');
        $this->form_d->entry_date = date('Y-m-d');
        $this->form_e->entry_date = date('Y-m-d');
        $this->form_f->entry_date = date('Y-m-d');
        $this->form_g->entry_date = date('Y-m-d');
        $this->form_h->entry_date = date('Y-m-d');
        $this->form_i->entry_date = date('Y-m-d');
        $this->form_j->entry_date = date('Y-m-d');
        $this->form_k->entry_date = date('Y-m-d');
        $this->form_l->entry_date = date('Y-m-d');
        $this->form_m->entry_date = date('Y-m-d');
        $this->form_n->entry_date = date('Y-m-d');
    }


    //--- Data entry for each tab and sub-tab code here ---//
    public function fnBloodRoutine()
    {
        //dd("saving blood routine");
        $this->msg_panel = false;
        $this->input = $this->form_a->all();
        $this->setPatientDataType();
        //dd($this->input); // 

        if($this->input['data_type'] === "unscheduled")
        {
            BloodRoutine::firstOrCreate($this->input);
            LivewireAlert::title('Blood Routine [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = BloodRoutine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                BloodRoutine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                BloodRoutine::firstOrCreate($this->input);
            }
            LivewireAlert::title('Blood Routine [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Blood Routine Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnBloodSugar()
    {
        //dd("saving blood sugar");
        $this->msg_panel = false;
        $this->input = $this->form_b->all();
        $this->setPatientDataType();

        if($this->input['data_type'] === "unscheduled")
        {
            BloodSugar::firstOrCreate($this->input);
            LivewireAlert::title('Blood Sugar [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = BloodSugar::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                BloodSugar::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                BloodSugar::firstOrCreate($this->input);
            }
            LivewireAlert::title('Blood Sugar [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        //dd($this->input); // 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Blood Sugar Data for Patient ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnBloodUrea()
    {
        //dd("saving blood urea");
        $this->input = $this->form_c->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            BloodUrea::firstOrCreate($this->input);
            LivewireAlert::title('Blood Urea [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = BloodUrea::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                BloodUrea::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                BloodUrea::firstOrCreate($this->input);
            }
            LivewireAlert::title('Blood Urea [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Blood Urea Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnChemExams()
    {
        //dd("saving chem exams");
        $this->input = $this->form_d->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            ChemicalExam::firstOrCreate($this->input);
            LivewireAlert::title('Chemical Exams [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = ChemicalExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                ChemicalExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                ChemicalExam::firstOrCreate($this->input);
            }
            LivewireAlert::title('Chemical Exams [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Chem Exam Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnCreatinine()
    {
        //dd("saving creatinine");
        $this->input = $this->form_e->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            Creatinine::firstOrCreate($this->input);
            LivewireAlert::title('Creatinine [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = Creatinine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                Creatinine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                Creatinine::firstOrCreate($this->input);
            }
            LivewireAlert::title('Creatinine [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Creatinine Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnCRP()
    {
        //dd("saving crp");
        $this->input = $this->form_f->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            Crp::firstOrCreate($this->input);
            LivewireAlert::title('Crp [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = Crp::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                Crp::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                Crp::firstOrCreate($this->input);
            }
            LivewireAlert::title('Crp [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] CRP Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnElectrolytes()
    {
        // dd("saving Electrolytes");
         $this->input = $this->form_g->all();
         $this->setPatientDataType();
        //dd($this->input); //
        if($this->input['data_type'] === "unscheduled")
        {
            Electrolytes::firstOrCreate($this->input);
            LivewireAlert::title('Electrolytes [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = Electrolytes::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                Electrolytes::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                Electrolytes::firstOrCreate($this->input);
            }
            LivewireAlert::title('Electrolytes [Follow-up type] Data Updated')->success()->asToast()->show();
        } 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Electrolytes Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnGeneralSummary()
    {
        //dd("saving Gen Summary");
        $this->input = $this->form_h->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            GeneralSummary::firstOrCreate($this->input);
            LivewireAlert::title('GeneralSummary [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = GeneralSummary::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                GeneralSummary::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                GeneralSummary::firstOrCreate($this->input);
            }
            LivewireAlert::title('GeneralSummary [Follow-up type] Data Updated')->success()->asToast()->show();
        } 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Gen Summary Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnIl6()
    {
        //dd("saving Il6");
        $this->input = $this->form_i->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            Il6::firstOrCreate($this->input);
            LivewireAlert::title('Il6 [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = Il6::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                Il6::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                Il6::firstOrCreate($this->input);
            }
            LivewireAlert::title('Il6 [Follow-up type] Data Updated')->success()->asToast()->show();
        } 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] IL-6 Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnLabExams()
    {
        //dd("saving Lab Exams");
        $this->input = $this->form_j->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            LaboratoryExam::firstOrCreate($this->input);
            LivewireAlert::title('Lab Exam [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = LaboratoryExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                LaboratoryExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                LaboratoryExam::firstOrCreate($this->input);
            }
            LivewireAlert::title('Lab Exam [Follow-up type] Data Updated')->success()->asToast()->show();
        } 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Lab Exam Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnLiverFunction()
    {
        //dd("saving Liver Functions");
        $this->input = $this->form_k->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            LiverFunction::firstOrCreate($this->input);
            LivewireAlert::title('LFT Data [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = LiverFunction::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                LiverFunction::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                LiverFunction::firstOrCreate($this->input);
            }
            LivewireAlert::title('LFT Data [Follow-up type] Data Updated')->success()->asToast()->show();
        } 
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Liv function Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnMicroscopicExam()
    {
        //dd("saving Microscopic Exams");
        $this->input = $this->form_l->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            MicroscopicExam::firstOrCreate($this->input);
            LivewireAlert::title('Microscopi Exam [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = MicroscopicExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                MicroscopicExam::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                MicroscopicExam::firstOrCreate($this->input);
            }
            LivewireAlert::title('Microscopi Exam [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Microscopic Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnRenalFunction()
    {
        //dd("saving Renal Functions");
        $this->input = $this->form_m->all();
        $this->setPatientDataType();
        //dd($this->input); //
        if($this->input['data_type'] === "unscheduled")
        {
            RenalFunction::firstOrCreate($this->input);
            LivewireAlert::title('RFT Data [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = RenalFunction::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                RenalFunction::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                RenalFunction::firstOrCreate($this->input);
            }
            LivewireAlert::title('RFT Data [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Renal Fn Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }

    public function fnUrineRoutine()
    {
        //dd("saving Urine Routine");
        $this->input = $this->form_n->all();
        $this->setPatientDataType();
        //dd($this->input); // 
        if($this->input['data_type'] === "unscheduled")
        {
            UrineRoutine::firstOrCreate($this->input);
            LivewireAlert::title('Urine Routine [Unscheduled Type] Data Updated')->success()->asToast()->show();
        }else {
            $resx = UrineRoutine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->first();
            if($resx)
            {
                UrineRoutine::where('patient_uuid', $this->patient_uuid)
                                ->where('data_type', $this->input['data_type'])
                                ->update($this->input);
            }else{
                UrineRoutine::firstOrCreate($this->input);
            }
            LivewireAlert::title('Urine Routine [Follow-up type] Data Updated')->success()->asToast()->show();
        }
        $msg = 'User ['.Auth::user()->name.'] saved ['.$this->input['data_type'].'] Urine Data for Patient ['.$this->patient_uuid.']';
        Log::channel('patient')->info($msg);
    }


    //--- End of data for tab functions.
}
