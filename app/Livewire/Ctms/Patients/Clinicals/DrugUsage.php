<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\DrugCategory;
use App\Models\Ctms\Clinicals\DrugDetails;

//forms
//use App\Livewire\Forms\clinicals\FormBloodRoutine;

//traits
//use App\Traits\TCtms\TClinicals\TBloodRoutine;

//logs
use Illuminate\Support\Facades\Log;

class DrugUsage extends Component
{
    public $sys_panel, $msg_panel;
    //forms
    //public $cat_p = false;
    public $p1 = false, $p2 = false, $p3 = false;

    public $patient_uuid;

    //variables
    public $ncDCat = [], $nDDetForm = [], $drug_categories, $drug_details;

    public function mount($patient_uuid)
    {
        //$this->p1 = false;
        $this->patient_uuid = $patient_uuid;
    }

    public function render()
    {
        $this->drug_details = DrugDetails::where('patient_uuid', $this->patient_uuid)->get();
        return view('livewire.ctms.patients.clinicals.drug-usage');
    }

    public function fnNewCategory()
    {
        //dd("category");
        $this->closeAllPanels();
        $this->p1 = true;
    }

    public function closeAllPanels()
    {
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
    }

    public function fnCreateNewCategory()
    {
        //dd("complete posting");
        $input = $this->ncDCat;

        //dd($input);

        $nCate = new DrugCategory();

        $nCate->category_name = $input['name'];
        $nCate->description = $input['desc'];
        $nCate->posted_by = Auth::user()->name;
        //dd($nCate);
        $nCate->save();
        $this->ncDCat = [];
        $this->drug_categories = DrugCategory::all();

    }

    public function fnNewDetailEntry()
    {
        $this->closeAllPanels();
        //dd("reached entry place");
        $this->drug_categories = DrugCategory::all();
        $this->p2 = true;
    }

    public function fnAddNewDrugDetail()
    {
        $input = $this->nDDetForm;
        //dd($input, $this->patient_uuid);
        $nDDet = new DrugDetails();
        $nDDet->patient_uuid = $this->patient_uuid;
        $nDDet->opd_id = $input['opd_id'];
        $nDDet->in_patient_id = $input['in_patient_id'];
        $nDDet->admission_date = $input['admission_date'];
        $nDDet->category_id = $input['cat_id'];
        $nDDet->drug_name = $input['name'];
        $nDDet->brand = $input['brand'];

        $nDDet->drug_class = $input['class'];
        $nDDet->generic_name = $input['generic_name'];
        $nDDet->single_dose = $input['single_dose'];
        $nDDet->frequency = $input['frequency'];
        $nDDet->total_daily_dose = $input['tdd'];
        $nDDet->last_week_adherance = $input['lwa'];
        $nDDet->status = 'draft';
        $nDDet->status_date = date('Y-m-d');
        $nDDet->comment_entered_by = $input['comment_entered_by'];
        $nDDet->entered_by = Auth::user()->name;
        $nDDet->entry_date = date('Y-m-d');

        $nDDet->comment_verified_by = null;
        $nDDet->verified_by = null;
        $nDDet->verified_date = null;
        $nDDet->comment_cro = null;
        $nDDet->cro_approval = null;
        $nDDet->cro_approval_date = null;
        $nDDet->comment_sealed_by = null;
        $nDDet->sealed_by = null;
        $nDDet->sealed_date = null;
        //dd($nDDet);
        $nDDet->save();
        $this->drug_details = DrugDetails::where('patient_uuid', $this->patient_uuid)->get();
        $input = [];
        $this->nDDetForm = [];
    
        
        
    }
}
