<?php

namespace App\Livewire\Ctms\Datareview;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

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

//traits
use App\Traits\Base;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class DatarevClinibiochemInfo extends Component
{
    use Base;
    //Trait binding

    //Form bindings
  
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Errors, Alers, Callouts

    public $Objs;


    //one object for every table initialize
    public $c1Objs,$c2Objs, $c3Objs, $c4Objs, $c5Objs, $c6Objs, $c7Objs;
    public $c8Objs, $c9Objs, $c10Objs, $c11Objs, $c12Objs, $c13Objs, $c14Objs;
    //public $c15Objs, $c16Objs;

    public $drug_details = [], $dCats = null, $ddet = [], $p1=false, $p2=false, $p3=false;
    public $drug_categories =[];

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->data_type = $data_type;
        // the patient object is used for codeing the page not needed comment it out.
        $this->Objs = Patient::where('patient_uuid', $this->patient_uuid)->get();

        $this->fnClinicalBiochemistryData();

        //dd($this->Objs);
    }

    public function fnClinicalBiochemistryData()
    {
        //now set for all other parameters
        $this->c1Objs = BloodRoutine::where('patient_uuid', $this->patient_uuid)->get();
        $this->c2Objs = BloodSugar::where('patient_uuid', $this->patient_uuid)->get();
        $this->c3Objs = BloodUrea::where('patient_uuid', $this->patient_uuid)->get();
        $this->c4Objs = ChemicalExam::where('patient_uuid', $this->patient_uuid)->get();
        $this->c5Objs = Creatinine::where('patient_uuid', $this->patient_uuid)->get();
        $this->c6Objs = Crp::where('patient_uuid', $this->patient_uuid)->get();
        $this->c7Objs = Electrolytes::where('patient_uuid', $this->patient_uuid)->get();
        $this->c8Objs = GeneralSummary::where('patient_uuid', $this->patient_uuid)->get();
        $this->c9Objs = Il6::where('patient_uuid', $this->patient_uuid)->get();
        $this->c10Objs = LaboratoryExam::where('patient_uuid', $this->patient_uuid)->get();
        $this->c11Objs = LiverFunction::where('patient_uuid', $this->patient_uuid)->get();
        $this->c12Objs = MicroscopicExam::where('patient_uuid', $this->patient_uuid)->get();
        $this->c13Objs = RenalFunction::where('patient_uuid', $this->patient_uuid)->get();
        $this->c14Objs = UrineRoutine::where('patient_uuid', $this->patient_uuid)->get();
        //many entries here use first, for drug entries, first should not be used, use get();
        $this->c15Objs = DrugDetails::where('patient_uuid', $this->patient_uuid)
                                        ->get()
                                        ->groupBy('data_type');
                                        //->toArray();
        $this->processDrugDetails($this->c15Objs);
        //dd($this->c15Objs);
        $this->c16Objs = DrugDetails::where('patient_uuid', $this->patient_uuid)->get()->groupBy('data_type');
        //$this->drug_details = DrugDetails::where('patient_uuid', $this->patient_uuid)->get();
        //dd($this->drug_details);
        //$this->drug_categories = DrugCategory::all();

        $this->dCats = DrugCategory::all();
    }

    public function processDrugDetails($c15Objs)
    {
        foreach($c15Objs as $key => $rows)
        {
            $this->drug_details[$key] = $rows->toArray();
        }
        //dd($this->drug_details);
    }

    public function render()
    {
        return view('livewire.ctms.datareview.datarev-clinibiochem-info');
    }
}
