<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\ClinicalData;

use App\Models\Ctms\Clinicals\BloodRoutine;
use App\Models\Ctms\Clinicals\BloodSugar;
use App\Models\Ctms\Clinicals\BloodUrea;
use App\Models\Ctms\Clinicals\ChemicalExam;
use App\Models\Ctms\Clinicals\Creatinine;
use App\Models\Ctms\Clinicals\Crp;
use App\Models\Ctms\Clinicals\Electrolytes;
use App\Models\Ctms\Clinicals\GeneralSummary;
use App\Models\Ctms\Clinicals\Il6;
use App\Models\Ctms\Clinicals\LaboratoryExam;
use App\Models\Ctms\Clinicals\LiverFunction;
use App\Models\Ctms\Clinicals\MicroscopicExam;
use App\Models\Ctms\Clinicals\RenalFunction;
use App\Models\Ctms\Clinicals\UrineRoutine;

//forms
use App\Livewire\Forms\PatientCIForm;
use App\Livewire\Forms\Clinicals\FormBloodRoutine;
use App\Livewire\Forms\Clinicals\FormBloodSugar;
use App\Livewire\Forms\Clinicals\FormBloodUrea;
use App\Livewire\Forms\Clinicals\FormChemExam;
use App\Livewire\Forms\Clinicals\FormCreatinine;
use App\Livewire\Forms\Clinicals\FormCrp;
use App\Livewire\Forms\Clinicals\FormElectrolytes;
use App\Livewire\Forms\Clinicals\FormGeneralSummary;
use App\Livewire\Forms\Clinicals\FormIl6;
use App\Livewire\Forms\Clinicals\FormLabExams;
use App\Livewire\Forms\Clinicals\FormLiverFunction;
use App\Livewire\Forms\Clinicals\FormMicroscopicExam;
use App\Livewire\Forms\Clinicals\FormRenalFunction;
use App\Livewire\Forms\Clinicals\FormUrineRoutine;

//traits, facades

//logs
use Illuminate\Support\Facades\Log;

class EditClinicalInfo extends Component
{
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

    //uuid of the patient
    public $uuid;
    public $clinical_info = null;
    public $c1Obj,$c2Obj,$c3Obj,$c4Obj,$c5Obj,$c6Obj,$c7Obj;
    public $c8Obj,$c9Obj,$c10Obj,$c11Obj,$c12Obj,$c13Obj,$c14Obj;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    public function render()
    {
        $this->clinical_info = ClinicalData::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->clinical_info);
        //$this->form->entered_by = Auth::user()->name;
        $this->setClinicalDataForm($this->clinical_info);

        //now set for all other parameters
        $this->c1Obj = BloodRoutine::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //dd($this->uuid, $this->c1Obj);
        //$this->form_a->entered_by = Auth::user()->name;
        $this->setC1ObjData($this->c1Obj);

        $this->c2Obj = BloodSugar::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_b->entered_by = Auth::user()->name;
        $this->setC2ObjData($this->c2Obj);

        $this->c3Obj = BloodUrea::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_c->entered_by = Auth::user()->name;
        $this->setC3ObjData($this->c3Obj);

        $this->c4Obj = ChemicalExam::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_d->entered_by = Auth::user()->name;
        $this->setC4ObjData($this->c4Obj);

        $this->c5Obj = Creatinine::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_e->entered_by = Auth::user()->name;
        $this->setC5ObjData($this->c5Obj);

        $this->c6Obj = Crp::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_f->entered_by = Auth::user()->name;
        $this->setC6ObjData($this->c6Obj);

        $this->c7Obj = Electrolytes::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_g->entered_by = Auth::user()->name;
        $this->setC7ObjData($this->c7Obj);

        $this->c8Obj = GeneralSummary::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_h->entered_by = Auth::user()->name;
        $this->setC8ObjData($this->c8Obj);

        $this->c9Obj = Il6::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_i->entered_by = Auth::user()->name;
        $this->setC9ObjData($this->c9Obj);

        $this->c10Obj = LaboratoryExam::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_j->entered_by = Auth::user()->name;
        $this->setC10ObjData($this->c10Obj);

        $this->c11Obj = LiverFunction::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_k->entered_by = Auth::user()->name;
        $this->setC11ObjData($this->c11Obj);

        $this->c12Obj = MicroscopicExam::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_l->entered_by = Auth::user()->name;
        $this->setC12ObjData($this->c12Obj);

        $this->c13Obj = RenalFunction::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_m->entered_by = Auth::user()->name;
        $this->setC13ObjData($this->c13Obj);

        $this->c14Obj = UrineRoutine::where('status', 'draft')->where('patient_uuid', $this->uuid)->first();
        //$this->form_n->entered_by = Auth::user()->name;
        $this->setC14ObjData($this->c14Obj);

        return view('livewire.ctms.patients.edit.edit-clinical-info');
    }

    public function setClinicalDataForm($clinical_info)
    {
        $this->form->opd_id = $clinical_info->opd_id;
        $this->form->in_patient_id = $clinical_info->in_patient_id;
        $this->form->admission_date = $clinical_info->admission_date;

        $this->form->o_e = $clinical_info->o_e;
        $this->form->pr = $clinical_info->pr;
        $this->form->temperature = $clinical_info->temperature;

        $this->form->bp_systolic = $clinical_info->bp_systolic;
        $this->form->bp_diastolic = $clinical_info->bp_diastolic;
        $this->form->cvs = $clinical_info->cvs;
        $this->form->p_a = $clinical_info->p_a;
        $this->form->cns = $clinical_info->cns;
        $this->form->cbc = $clinical_info->cbc;
        $this->form->esr = $clinical_info->esr;
        $this->form->crp = $clinical_info->crp;
        $this->form->rft = $clinical_info->rft;
        $this->form->lft = $clinical_info->lft;
        
        $this->form->clotting_time = $clinical_info->clotting_time;
        $this->form->bleeding_time = $clinical_info->bleeding_time;
        $this->form->prothrombin_time = $clinical_info->prothrombin_time;
        $this->form->procalcitonin = $clinical_info->procalcitonin;
        $this->form->laboratory_report_file = $clinical_info->laboratory_report_file;
    }


    //blood routine
    public function setC1ObjData($c1Obj)
    {
        $this->form_a->opd_id = $c1Obj->opd_id;
        $this->form_a->in_patient_id = $c1Obj->in_patient_id;
        $this->form_a->admission_date = $c1Obj->admission_date;


        $this->form_a->rbc = $c1Obj->rbc;
        $this->form_a->hgb = $c1Obj->hgb;
        $this->form_a->hct = $c1Obj->hct;
        $this->form_a->mcv = $c1Obj->mcv;
        $this->form_a->mch = $c1Obj->mch;

        $this->form_a->mchc = $c1Obj->mchc;
        $this->form_a->rdw_sd = $c1Obj->rdw_sd;
        $this->form_a->rdw_cv = $c1Obj->rdw_cv;
        $this->form_a->plt = $c1Obj->plt;
        $this->form_a->pdw = $c1Obj->pdw;

        $this->form_a->mpv = $c1Obj->mpv;
        $this->form_a->plcr = $c1Obj->plcr;
        $this->form_a->pct = $c1Obj->pct;
        $this->form_a->wbc = $c1Obj->wbc;

        $this->form_a->neutrophils_abs = $c1Obj->neutrophils_abs;
        $this->form_a->neutrophils_percent = $c1Obj->neutrophils_percent;
        $this->form_a->lymph_abs = $c1Obj->lymph_abs;
        $this->form_a->lymph_percent = $c1Obj->lymph_percent;

        $this->form_a->mono_abs = $c1Obj->mono_abs;
        $this->form_a->mono_percent = $c1Obj->mono_percent;
        $this->form_a->eo_abs = $c1Obj->eo_abs;
        $this->form_a->eo_percent = $c1Obj->eo_percent;

        $this->form_a->baso_abs = $c1Obj->baso_abs;
        $this->form_a->baso_percent = $c1Obj->baso_percent;
        $this->form_a->ig_abs = $c1Obj->ig_abs;
        $this->form_a->ig_percent = $c1Obj->ig_percent;

        $this->form_a->observations = $c1Obj->observations;
        $this->form_a->br_report_file = $c1Obj->br_report_file;
        $this->form_a->br_report_file_path = $c1Obj->br_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_a->comment_entered_by = $c1Obj->comment_entered_by;
        $this->form_a->entered_by = $c1Obj->entered_by;
        $this->form_a->entry_date = $c1Obj->entry_date;
    }

    //blood sugar
    public function setC2ObjData($c2Obj)
    {
        $this->form_b->opd_id = $c2Obj->opd_id;
        $this->form_b->in_patient_id = $c2Obj->in_patient_id;
        $this->form_b->admission_date = $c2Obj->admission_date;

        $this->form_b->fasting = $c2Obj->fasting;
        $this->form_b->post_prandial = $c2Obj->post_prandial;
        $this->form_b->random = $c2Obj->random;
        $this->form_b->bs_report_file = $c2Obj->bs_report_file;
        $this->form_b->bs_report_file_path = $c2Obj->bs_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_b->comment_entered_by = $c2Obj->comment_entered_by;
        $this->form_b->entered_by = $c2Obj->entered_by;
        $this->form_b->entry_date = $c2Obj->entry_date;
    }

    //blood urea
    public function setC3ObjData($c3Obj)
    {
        $this->form_c->opd_id = $c3Obj->opd_id;
        $this->form_c->in_patient_id = $c3Obj->in_patient_id;
        $this->form_c->admission_date = $c3Obj->admission_date;

        $this->form_c->urea = $c3Obj->urea;
        $this->form_c->blood_urea_nitrogen = $c3Obj->blood_urea_nitrogen;
        $this->form_c->bubun_report_file = $c3Obj->bubun_report_file;
        $this->form_c->bubun_report_file_path = $c3Obj->bubun_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_c->comment_entered_by = $c3Obj->comment_entered_by;
        $this->form_c->entered_by = $c3Obj->entered_by;
        $this->form_c->entry_date = $c3Obj->entry_date;
    }

   //Chem exam
    public function setC4ObjData($c4Obj)
    {
        $this->form_d->opd_id = $c4Obj->opd_id;
        $this->form_d->in_patient_id = $c4Obj->in_patient_id;
        $this->form_d->admission_date = $c4Obj->admission_date;

        $this->form_d->proteins = $c4Obj->proteins;
        $this->form_d->sugar = $c4Obj->sugar;
        $this->form_d->ketones = $c4Obj->ketones;
        $this->form_d->procalcitonin = $c4Obj->procalcitonin;
        $this->form_d->bile_salts = $c4Obj->bile_salts;
        $this->form_d->bile_pigments = $c4Obj->bile_pigments;
        $this->form_d->ce_report_file = $c4Obj->ce_report_file;
        $this->form_d->ce_report_file_path = $c4Obj->ce_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_d->comment_entered_by = $c4Obj->comment_entered_by;
        $this->form_d->entered_by = $c4Obj->entered_by;
        $this->form_d->entry_date = $c4Obj->entry_date;
    }

   //Creatinine
    public function setC5ObjData($c5Obj)
    {
        $this->form_e->opd_id = $c5Obj->opd_id;
        $this->form_e->in_patient_id = $c5Obj->in_patient_id;
        $this->form_e->admission_date = $c5Obj->admission_date;

        $this->form_e->serum_creatinine = $c5Obj->serum_creatinine;
        $this->form_e->creatine_report_file = $c5Obj->creatine_report_file;
        $this->form_e->creatine_report_file_path = $c5Obj->creatine_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_e->comment_entered_by = $c5Obj->comment_entered_by;
        $this->form_e->entered_by = $c5Obj->entered_by;
        $this->form_e->entry_date = $c5Obj->entry_date;
    }

    //Crp
    public function setC6ObjData($c6Obj)
    {
        $this->form_f->opd_id = $c6Obj->opd_id;
        $this->form_f->in_patient_id = $c6Obj->in_patient_id;
        $this->form_f->admission_date = $c6Obj->admission_date;

        $this->form_f->crp = $c6Obj->crp;
        $this->form_f->crp_report_file = $c6Obj->crp_report_file;
        $this->form_f->crp_report_file_path = $c6Obj->crp_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_f->comment_entered_by = $c6Obj->comment_entered_by;
        $this->form_f->entered_by = $c6Obj->entered_by;
        $this->form_f->entry_date = $c6Obj->entry_date;
    }

    //Crp
    public function setC7ObjData($c7Obj)
    {
        $this->form_g->opd_id = $c7Obj->opd_id;
        $this->form_g->in_patient_id = $c7Obj->in_patient_id;
        $this->form_g->admission_date = $c7Obj->admission_date;

        $this->form_g->sodium = intval($c7Obj->sodium);
        $this->form_g->potassium = intval($c7Obj->potassium);
        $this->form_g->chloride = intval($c7Obj->chloride);

        //--------X Common to all tables X-------------//
        $this->form_g->comment_entered_by = $c7Obj->comment_entered_by;
        $this->form_g->entered_by = $c7Obj->entered_by;
        $this->form_g->entry_date = $c7Obj->entry_date;
    }

    //gen summary
    public function setC8ObjData($c8Obj)
    {
        $this->form_h->opd_id = $c8Obj->opd_id;
        $this->form_h->in_patient_id = $c8Obj->in_patient_id;
        $this->form_h->admission_date = $c8Obj->admission_date;

        $this->form_h->general_summary = $c8Obj->general_summary;

        //--------X Common to all tables X-------------//
        $this->form_h->comment_entered_by = $c8Obj->comment_entered_by;
        $this->form_h->entered_by = $c8Obj->entered_by;
        $this->form_h->entry_date = $c8Obj->entry_date;
    }

    public function setC9ObjData($c9Obj)
    {
        $this->form_i->opd_id = $c9Obj->opd_id;
        $this->form_i->in_patient_id = $c9Obj->in_patient_id;
        $this->form_i->admission_date = $c9Obj->admission_date;

        $this->form_i->il6 = $c9Obj->il6;
        $this->form_i->il6_report_file = $c9Obj->il6_report_file;
        $this->form_i->il6_report_file_path = $c9Obj->il6_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_i->comment_entered_by = $c9Obj->comment_entered_by;
        $this->form_i->entered_by = $c9Obj->entered_by;
        $this->form_i->entry_date = $c9Obj->entry_date;
    }

    public function setC10ObjData($c10Obj)
    {
       // dd($c10Obj);
        $this->form_j->opd_id = $c10Obj->opd_id;
        $this->form_j->in_patient_id = $c10Obj->in_patient_id;
        $this->form_j->admission_date = $c10Obj->admission_date;

        $this->form_j->esr = $c10Obj->esr;
        $this->form_j->pt_patient = $c10Obj->pt_patient;
        $this->form_j->pt_control = $c10Obj->pt_control;
        $this->form_j->inr = $c10Obj->inr;
        $this->form_j->isi = $c10Obj->isi;

        $this->form_j->esr_report_file = $c10Obj->esr_report_file;
        $this->form_j->esr_report_file_path = $c10Obj->esr_report_file_path;
        $this->form_j->pt_report_file = $c10Obj->pt_report_file;
        $this->form_j->pt_report_file_path = $c10Obj->pt_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_j->comment_entered_by = $c10Obj->comment_entered_by;
        $this->form_j->entered_by = $c10Obj->entered_by;
        $this->form_j->entry_date = $c10Obj->entry_date;
    }

    public function setC11ObjData($c11Obj)
    {
        $this->form_k->opd_id = $c11Obj->opd_id;
        $this->form_k->in_patient_id = $c11Obj->in_patient_id;
        $this->form_k->admission_date = $c11Obj->admission_date;

        $this->form_k->serum_total_protein = intval($c11Obj->serum_total_protein);
        $this->form_k->serum_albumin = intval($c11Obj->serum_albumin);
        $this->form_k->globulin = intval($c11Obj->globulin);
        $this->form_k->ag_ratio = intval($c11Obj->ag_ratio);
        $this->form_k->total_bilirubin = intval($c11Obj->total_bilirubin);

        $this->form_k->direct_bilirubin = intval($c11Obj->direct_bilirubin);
        $this->form_k->indirect_bilirubin = intval($c11Obj->indirect_bilirubin);
        $this->form_k->sgot = intval($c11Obj->sgot);
        $this->form_k->sgpt = intval($c11Obj->sgpt);
        $this->form_k->alkaline_phosphatase = intval($c11Obj->alkaline_phosphatase);

        $this->form_k->observations = null;
        $this->form_k->lft_report_file = $c11Obj->lft_report_file;
        $this->form_k->lft_report_file_path = $c11Obj->lft_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_k->comment_entered_by = $c11Obj->comment_entered_by;
        $this->form_k->entered_by = $c11Obj->entered_by;
        $this->form_k->entry_date = $c11Obj->entry_date;
    }

    public function setC12ObjData($c12Obj)
    {
        $this->form_l->opd_id = $c12Obj->opd_id;
        $this->form_l->in_patient_id = $c12Obj->in_patient_id;
        $this->form_l->admission_date = $c12Obj->admission_date;

        $this->form_l->pus_cells = $c12Obj->pus_cells;
        $this->form_l->epithelial_cells = $c12Obj->epithelial_cells;
        $this->form_l->rbcs = $c12Obj->rbcs;
        $this->form_l->yeast_cells = $c12Obj->yeast_cells;
        $this->form_l->bacteria = $c12Obj->bacteria;

        $this->form_l->me_report_file = $c12Obj->me_report_file;
        $this->form_l->me_report_file_path = $c12Obj->me_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_l->comment_entered_by = $c12Obj->comment_entered_by;
        $this->form_l->entered_by = $c12Obj->entered_by;
        $this->form_l->entry_date = $c12Obj->entry_date;
    }

    public function setC13ObjData($c13Obj)
    {
        $this->form_m->opd_id = $c13Obj->opd_id;
        $this->form_m->in_patient_id = $c13Obj->in_patient_id;
        $this->form_m->admission_date = $c13Obj->admission_date;

        $this->form_m->uric_acid = $c13Obj->uric_acid;
        $this->form_m->uricacid_report_file = $c13Obj->uricacid_report_file;
        $this->form_m->uricacid_report_file_path = $c13Obj->uricacid_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_m->comment_entered_by = $c13Obj->comment_entered_by;
        $this->form_m->entered_by = $c13Obj->entered_by;
        $this->form_m->entry_date = $c13Obj->entry_date;
    }

    public function setC14ObjData($c14Obj)
    {
        $this->form_n->opd_id = $c14Obj->opd_id;
        $this->form_n->in_patient_id = $c14Obj->in_patient_id;
        $this->form_n->admission_date = $c14Obj->admission_date;   
        
        $this->form_n->physical_exam = $c14Obj->physical_exam;
        $this->form_n->quantity = $c14Obj->quantity;
        $this->form_n->colour = $c14Obj->colour;
        $this->form_n->appearance = $c14Obj->appearance;
        $this->form_n->deposits = $c14Obj->deposits;
        $this->form_n->ph = $c14Obj->ph;
        $this->form_n->specific_gravity = $c14Obj->specific_gravity;

        $this->form_n->ur_report_file = $c14Obj->ur_report_file;
        $this->form_n->ur_report_file_path = $c14Obj->ur_report_file_path;

        //--------X Common to all tables X-------------//
        $this->form_n->comment_entered_by = $c14Obj->comment_entered_by;
        $this->form_n->entered_by = $c14Obj->entered_by;
        $this->form_n->entry_date = $c14Obj->entry_date;
    }


    public function fnSaveEditedClinicalData()
    {   $this->message_panel = false;
        $this->validate(); 
        $this->input = $this->form->all();

        //dd($this->input);       
        $this->message_panel = true;
        $name = $this->uuid;
        try {
            $result = ClinicalData::where('patient_uuid', $this->uuid)->update($this->input);
            if ($result) {        
                $msg = 'Patient ['.$name.'] update successfull!';  
                $this->comSuccess = $msg;
                Log::channel('patient')->info($msg);
            } else {
                $msg = 'Patient ['.$name.'] could not be saved';
                $this->sysAlertDanger = $msg;
                Log::channel('patient')->info($msg);
            }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient ['.$name.'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $this->sysAlertDanger = $msg;
        }      
    }

    public function fnBloodRoutine()
    {   $this->message_panel = false;
        //dd("reached blood routine");
        $this->input = $this->form_a->all();
        //dd($this->uuid, $this->form_a->opd_id, $this->input); // 
        $result = BloodRoutine::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Blood Routine Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnBloodSugar()
    {   $this->message_panel = false;
        $this->input = $this->form_b->all();
        //dd($this->input); // 
        $result = BloodSugar::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Blood Sugar Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnBloodUrea()
    {
        $this->input = $this->form_c->all();
        //dd($this->input); // 
        $result = BloodUrea::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Blood Urea Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnChemExams()
    {
        $this->input = $this->form_d->all();
        //dd($this->input); // 
        $result = ChemicalExam::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Chem Exam Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnCreatinine()
    {
        $this->input = $this->form_e->all();
        //dd($this->input); // 
        $result = Creatinine::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Creatinine Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnCRP()
    {
        $this->input = $this->form_f->all();
        //dd($this->input); // 
        $result = Crp::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved CRP Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnElectrolytes()
    {
        $this->input = $this->form_g->all();
        //dd($this->input); // 
        $result = Electrolytes::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Electrolytes Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnGeneralSummary()
    {
        $this->input = $this->form_h->all();
        //dd($this->input); // 
        $result = GeneralSummary::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Gen Summary Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnIl6()
    {
        $this->input = $this->form_i->all();
        //dd($this->input); // 
        $result = Il6::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved IL-6 Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnLabExams()
    {
        $this->input = $this->form_j->all();
        //dd($this->input); // 
        $result = LaboratoryExam::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Lab Exam Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnLiverFunction()
    {
        $this->input = $this->form_k->all();
        //dd($this->input); // 
        $result = LiverFunction::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Liv function Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 

    public function fnMicroscopicExam()
    {
        $this->input = $this->form_l->all();
        //dd($this->input); // 
        $result = MicroscopicExam::where('patient_uuid', $this->uuid)->update($this->input);
        $msg = 'User ['.Auth::user()->name.'] saved Microscopic Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 

    public function fnRenalFunction()
    {
        $this->input = $this->form_m->all();
        //dd($this->input); //
        $result = RenalFunction::where('patient_uuid', $this->uuid)->update($this->input); 
        $msg = 'User ['.Auth::user()->name.'] saved Renal Fn Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    }

    public function fnUrineRoutine()
    {
        $this->input = $this->form_n->all();
        //dd($this->input); // 
        $result = UrineRoutine::where('patient_uuid', $this->uuid)->update($this->input); 
        $msg = 'User ['.Auth::user()->name.'] saved Urine Data ['.$this->uuid.']';
        Log::channel('patient')->info($msg);
        $this->message_panel = true;
        $sysAlertWarning = false;
        $this->comSuccess = $msg;
    } 

}