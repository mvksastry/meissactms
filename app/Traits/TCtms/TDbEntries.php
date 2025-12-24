<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Patient;
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;

use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;

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

//
use Illuminate\Support\Facades\Log;

trait TDbEntries
{

  public function setDbEntriesPatientModels($uuid, $input)
  {
      dd($uuid, $input);
      //make entries in all relevant tables.
      $newLS = new LifeStyle();
      $newLS->patient_uuid = $uuid;
      $newLS->opd_id =  $input['opd_id'];
      $newLS->in_patient_id =  $input['in_patient_id'];
      $newLS->admission_date =  $input['admission_date'];
      $newLS->status = 'draft';
      $newLS->status_date = date('Y-m-d');
      $newLS->save();

      $newCD = new ClinicalData();
      $newCD->opd_id =  $input['opd_id'];
      $newCD->in_patient_id =  $input['in_patient_id'];
      $newCD->admission_date =  $input['admission_date'];
      $newCD->patient_uuid = $uuid;
      $newCD->status = 'draft';
      $newCD->status_date = date('Y-m-d');
      $newCD->save();

      $newSE = new SensoryExamination();
      $newSE->patient_uuid = $uuid;
      $newSE->opd_id =  $input['opd_id'];
      $newSE->in_patient_id =  $input['in_patient_id'];
      $newSE->admission_date =  $input['admission_date'];
      $newSE->status = 'draft';
      $newSE->status_date = date('Y-m-d');
      $newSE->save();

      $newMDT = new Mdtre();
      $newMDT->patient_uuid = $uuid;
      $newMDT->opd_id =  $input['opd_id'];
      $newMDT->in_patient_id =  $input['in_patient_id'];
      $newMDT->admission_date =  $input['admission_date'];
      $newMDT->status = 'draft';
      $newMDT->status_date = date('Y-m-d');
      $newMDT->save();

      $newPfg = new PfirmannGrade();
      $newPfg->patient_uuid = $uuid;
      $newPfg->opd_id =  $input['opd_id'];
      $newPfg->in_patient_id =  $input['in_patient_id'];
      $newPfg->admission_date =  $input['admission_date'];
      $newPfg->status = 'draft';
      $newPfg->status_date = date('Y-m-d');
      $newPfg->save();

      $newVasc = new VAScore();
      $newVasc->patient_uuid = $uuid;
      $newVasc->opd_id =  $input['opd_id'];
      $newVasc->in_patient_id =  $input['in_patient_id'];
      $newVasc->admission_date =  $input['admission_date'];
      $newVasc->status = 'draft';
      $newVasc->status_date = date('Y-m-d');
      $newVasc->save();

      $newModq = new ModqScore();
      $newModq->patient_uuid = $uuid;
      $newModq->opd_id =  $input['opd_id'];
      $newModq->in_patient_id =  $input['in_patient_id'];
      $newModq->admission_date =  $input['admission_date'];              
      $newModq->status = 'draft';
      $newModq->status_date = date('Y-m-d');
      $newModq->save();

      $newRMQ = new RMQReply();
      $newRMQ->patient_uuid = $uuid;
      $newRMQ->opd_id =  $input['opd_id'];
      $newRMQ->in_patient_id =  $input['in_patient_id'];
      $newRMQ->admission_date =  $input['admission_date']; 
      $newRMQ->status = 'draft';
      $newRMQ->status_date = date('Y-m-d');
      $newRMQ->save();

      //-- complete rest of the --//

      $an1 = new BloodRoutine();
      $an1->patient_uuid = $uuid;
      $an1->opd_id =  $input['opd_id'];
      $an1->in_patient_id =  $input['in_patient_id'];
      $an1->admission_date =  $input['admission_date']; 
      $an1->status = 'draft';
      $an1->status_date = date('Y-m-d');
      $an1->save();

      $an2 = new BloodSugar();
      $an2->patient_uuid = $uuid;
      $an2->opd_id =  $input['opd_id'];
      $an2->in_patient_id =  $input['in_patient_id'];
      $an2->admission_date =  $input['admission_date']; 
      $an2->status = 'draft';
      $an2->status_date = date('Y-m-d');
      $an2->save();


      $an3 = new BloodUrea();
      $an3->patient_uuid = $uuid;
      $an3->opd_id =  $input['opd_id'];
      $an3->in_patient_id =  $input['in_patient_id'];
      $an3->admission_date =  $input['admission_date']; 
      $an3->status = 'draft';
      $an3->status_date = date('Y-m-d');
      $an3->save();

      $an4 = new ChemicalExam();
      $an4->patient_uuid = $uuid;
      $an4->opd_id =  $input['opd_id'];
      $an4->in_patient_id =  $input['in_patient_id'];
      $an4->admission_date =  $input['admission_date']; 
      $an4->status = 'draft';
      $an4->status_date = date('Y-m-d');
      $an4->save();

      $an5 = new Creatinine();
      $an5->patient_uuid = $uuid;
      $an5->opd_id =  $input['opd_id'];
      $an5->in_patient_id =  $input['in_patient_id'];
      $an5->admission_date =  $input['admission_date']; 
      $an5->status = 'draft';
      $an5->status_date = date('Y-m-d');
      $an5->save();

      $an6 = new Crp();
      $an6->patient_uuid = $uuid;
      $an6->opd_id =  $input['opd_id'];
      $an6->in_patient_id =  $input['in_patient_id'];
      $an6->admission_date =  $input['admission_date']; 
      $an6->status = 'draft';
      $an6->status_date = date('Y-m-d');
      $an6->save();

      $an7 = new Electrolytes();
      $an7->patient_uuid = $uuid;
      $an7->opd_id =  $input['opd_id'];
      $an7->in_patient_id =  $input['in_patient_id'];
      $an7->admission_date =  $input['admission_date']; 
      $an7->status = 'draft';
      $an7->status_date = date('Y-m-d');
      $an7->save();

      $an8 = new GeneralSummary();
      $an8->patient_uuid = $uuid;
      $an8->opd_id =  $input['opd_id'];
      $an8->in_patient_id =  $input['in_patient_id'];
      $an8->admission_date =  $input['admission_date']; 
      $an8->status = 'draft';
      $an8->status_date = date('Y-m-d');
      $an8->save();

      $an9 = new Il6();
      $an9->patient_uuid = $uuid;
      $an9->opd_id =  $input['opd_id'];
      $an9->in_patient_id =  $input['in_patient_id'];
      $an9->admission_date =  $input['admission_date']; 
      $an9->status = 'draft';
      $an9->status_date = date('Y-m-d');
      $an9->save();

      $an10 = new LaboratoryExam();
      $an10->patient_uuid = $uuid;
      $an10->opd_id =  $input['opd_id'];
      $an10->in_patient_id =  $input['in_patient_id'];
      $an10->admission_date =  $input['admission_date']; 
      $an10->status = 'draft';
      $an10->status_date = date('Y-m-d');
      $an10->save();

      $an11 = new LiverFunction();
      $an11->patient_uuid = $uuid;
      $an11->opd_id =  $input['opd_id'];
      $an11->in_patient_id =  $input['in_patient_id'];
      $an11->admission_date =  $input['admission_date']; 
      $an11->status = 'draft';
      $an11->status_date = date('Y-m-d');
      $an11->save();

      $an12 = new MicroscopicExam();
      $an12->patient_uuid = $uuid;
      $an12->opd_id =  $input['opd_id'];
      $an12->in_patient_id =  $input['in_patient_id'];
      $an12->admission_date =  $input['admission_date']; 
      $an12->status = 'draft';
      $an12->status_date = date('Y-m-d');
      $an12->save();

      $an13 = new RenalFunction();
      $an13->patient_uuid = $uuid;
      $an13->opd_id =  $input['opd_id'];
      $an13->in_patient_id =  $input['in_patient_id'];
      $an13->admission_date =  $input['admission_date']; 
      $an13->status = 'draft';
      $an13->status_date = date('Y-m-d');
      $an13->save();

      $an14 = new UrineRoutine();
      $an14->patient_uuid = $uuid;
      $an14->opd_id =  $input['opd_id'];
      $an14->in_patient_id =  $input['in_patient_id'];
      $an14->admission_date =  $input['admission_date']; 
      $an14->status = 'draft';
      $an14->status_date = date('Y-m-d');
      $an14->save();

  }

}