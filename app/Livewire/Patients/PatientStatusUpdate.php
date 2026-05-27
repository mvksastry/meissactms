<?php

namespace App\Livewire\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;
use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;
use App\Models\Ctms\PatientEpoch;

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

use App\Traits\Base;
use App\Traits\TCtms\TPatientStatus;
use App\Traits\TCtms\TPatientTimeline;
use App\Traits\TCtms\TDBStatusUpdates;

class PatientStatusUpdate extends Component
{
    //
    use Base;
    use TPatientStatus;
    use TPatientTimeline;
    use TDBStatusUpdates;

    public $status_array = [
                        'clinical_dataentry'=>'verified',
                        'junior_resident'=>'verified',
                        'senior_resident'=>'verified',
                        'clinical_manager'=>'approved',
                        'ctms_incharge'=>'sealed'
                        ];

    public $patient_uuid;
    public $status_comment;
    
    public $pcs;
    
    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;

        $this->setPatientCurrentStatus($patient_uuid);
    }

    public function render()
    {
        return view('livewire.patients.patient-status-update');
    }

    public function setPatientCurrentStatus($patient_uuid)
    {
        //dd($patient_uuid);
        $this->pcs['pcs'] = Patient::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['lifestyle'] = LifeStyle::where('patient_uuid', $patient_uuid)->first();


        $this->pcs['clinicaldata'] = ClinicalData::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['sensexam'] = SensoryExamination::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['mdtre'] = Mdtre::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['pfirmans'] = PfirmannGrade::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['vascore'] = VAScore::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['modqscore'] = ModqScore::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['rmqreply'] = RMQReply::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['br'] = BloodRoutine::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['bs'] = BloodSugar::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['bu'] = BloodUrea::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['ce'] = ChemicalExam::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['creatine'] = Creatinine::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['crp'] = Crp::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['electro'] = Electrolytes::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['gs'] = GeneralSummary::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['il6'] = Il6::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['le'] = LaboratoryExam::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['lft'] = LiverFunction::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['mes'] = MicroscopicExam::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['rft'] = RenalFunction::where('patient_uuid', $patient_uuid)->first();
        $this->pcs['ure'] = UrineRoutine::where('patient_uuid', $patient_uuid)->first();

        //dd($this->pcs);
    }

    public function setNewPatientStatus($patient_uuid)
    {
        $role = Auth::user()->roles->pluck('name')[0] ?? '' ;
        $input['status_comment'] = $this->status_comment;

        switch ($role) {

            case 'clinical_dataentry':
                $input['status_by'] = Auth::user()->name;
                $input['status'] = 'verified';
                $input['date_updated'] = date('Y-m-d');
            break;

            case 'junior_resident':
                $input['status_by'] = Auth::user()->name;
                $input['status'] = 'verified';
                $input['date_updated'] = date('Y-m-d');
            break;

            case 'senior_resident':
                $input['status_by'] = Auth::user()->name;
                $input['status'] = 'verified';
                $input['date_updated'] = date('Y-m-d');
            break;

            //take note of this role

            case 'clinical_manager':
                $input['status_by'] = Auth::user()->name;
                $input['status'] = 'approved';
                $input['date_updated'] = date('Y-m-d');
            break;

            //take note of this role

            case 'ctms_incharge':
                $input['status_by'] = Auth::user()->name;
                $input['status'] = 'sealed';
                $input['date_updated'] = date('Y-m-d');
            break;  

            default:
                $input['status'] = 'draft';
        }

        $result = $this->setUpdatedPatientDataStatus($patient_uuid, $input);

        if($result)
        {
            $this->dispatch('closeStatusPanel');
        }
        //dd($result);       
    }
}
