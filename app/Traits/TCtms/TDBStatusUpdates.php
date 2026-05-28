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

trait TDbStatusUpdates
{


//this should be followed update of timeline of the patient.
  public function setUpdatedPatientDataStatus($uuid, $input)
  {
      //first update the mail patient table here itself.
      //then call the other tables.
      $statusUpdate = Patient::where('patient_uuid', $uuid)->first();
      $statusUpdate->status = $input['status'];
      $statusUpdate->status_date = date('Y-m-d');

      //dd($uuid, $input);      
        switch ($input['status']) {

            case 'verified':
              $statusUpdate->comment_verified_by=  $input['status_comment'];
              $statusUpdate->verified_by = Auth::user()->name;
              $statusUpdate->verified_date = date('Y-m-d');
            break;

            case 'approved':
              $statusUpdate->comment_approved_by=  $input['status_comment'];
              $statusUpdate->approved_by = Auth::user()->name;
              $statusUpdate->approved_date = date('Y-m-d');
            break;

            case 'sealed':
              $statusUpdate->comment_sealed_by=  $input['status_comment'];
              $statusUpdate->sealed_by = Auth::user()->name;
              $statusUpdate->sealed_date = date('Y-m-d');
            break;

            default:
              $input['status'] = 'draft';
        }
        //dd($statusUpdate);
        $result = $statusUpdate->save();
        
        return $result;


      //IMPORTANT BREAKING CHANGE, IN ALL 23 TABLES, BEYOND ENTERED BY STATUS
      //DONT CHANGE ANYTHING. IT IS NOT NEEDED WE CAN REMOVE THE COLUMNS AS
      //ONLY PATIENT TABLE NEEDS TO UPDATED.
      /*
      //make entries in all relevant tables.
      $newLS = LifeStyle::where('patient_uuid', $uuid)->first();
      
      $newLS->comment_verified_by =  $input['status_comment'];
      $newLS->verified_by =  $input['status_by'];
      $newLS->verified_date =  $input['date_updated'];

      $newLS->status = $input['status'];
      $newLS->status_date = date('Y-m-d');
      //dd($newLS);
      $newLS->save();

      $newCD = ClinicalData::where('patient_uuid', $uuid)->first();
      
      

      $newCD->status = 'draft';
      $newCD->status_date = date('Y-m-d');
      $newCD->save();

      $newSE = SensoryExamination::where('patient_uuid', $uuid)->first();
      
      $newSE->status = 'draft';
      $newSE->status_date = date('Y-m-d');
      $newSE->save();

      $newMDT = Mdtre::where('patient_uuid', $uuid)->first();
      
      

      $newMDT->status = 'draft';
      $newMDT->status_date = date('Y-m-d');
      $newMDT->save();

      $newPfg = PfirmannGrade::where('patient_uuid', $uuid)->first();
      
      $newPfg->status = 'draft';
      $newPfg->status_date = date('Y-m-d');
      $newPfg->save();

      $newVasc = VAScore::where('patient_uuid', $uuid)->first();
      
      $newVasc->status = 'draft';
      $newVasc->status_date = date('Y-m-d');
      $newVasc->save();

      $newModq = ModqScore::where('patient_uuid', $uuid)->first();
                  
      $newModq->status = 'draft';
      $newModq->status_date = date('Y-m-d');
      $newModq->save();

      $newRMQ = RMQReply::where('patient_uuid', $uuid)->first();
      
      $newRMQ->status = 'draft';
      $newRMQ->status_date = date('Y-m-d');
      $newRMQ->save();

      //-- complete rest of the --//

      $an1 = BloodRoutine::where('patient_uuid', $uuid)->first();
      
      $an1->status = 'draft';
      $an1->status_date = date('Y-m-d');
      $an1->save();

      $an2 = BloodSugar::where('patient_uuid', $uuid)->first();
      
      $an2->status = 'draft';
      $an2->status_date = date('Y-m-d');
      $an2->save();


      $an3 = BloodUrea::where('patient_uuid', $uuid)->first();
      
      $an3->status = 'draft';
      $an3->status_date = date('Y-m-d');
      $an3->save();

      $an4 = ChemicalExam::where('patient_uuid', $uuid)->first();
      
      $an4->status = 'draft';
      $an4->status_date = date('Y-m-d');
      $an4->save();

      $an5 = Creatinine::where('patient_uuid', $uuid)->first();
      
      $an5->status = 'draft';
      $an5->status_date = date('Y-m-d');
      $an5->save();

      $an6 = Crp::where('patient_uuid', $uuid)->first();
      
      $an6->status = 'draft';
      $an6->status_date = date('Y-m-d');
      $an6->save();

      $an7 = Electrolytes::where('patient_uuid', $uuid)->first();
      
      $an7->status = 'draft';
      $an7->status_date = date('Y-m-d');
      $an7->save();

      $an8 = GeneralSummary::where('patient_uuid', $uuid)->first();
      
      $an8->status = 'draft';
      $an8->status_date = date('Y-m-d');
      $an8->save();

      $an9 = Il6::where('patient_uuid', $uuid)->first();
      
      $an9->status = 'draft';
      $an9->status_date = date('Y-m-d');
      $an9->save();

      $an10 = LaboratoryExam::where('patient_uuid', $uuid)->first();
      
      $an10->status = 'draft';
      $an10->status_date = date('Y-m-d');
      $an10->save();

      $an11 = LiverFunction::where('patient_uuid', $uuid)->first();
      
      $an11->status = 'draft';
      $an11->status_date = date('Y-m-d');
      $an11->save();

      $an12 = MicroscopicExam::where('patient_uuid', $uuid)->first();
      
      $an12->status = 'draft';
      $an12->status_date = date('Y-m-d');
      $an12->save();

      $an13 = RenalFunction::where('patient_uuid', $uuid)->first();
      
      $an13->status = 'draft';
      $an13->status_date = date('Y-m-d');
      $an13->save();

      $an14 = UrineRoutine::where('patient_uuid', $uuid)->first();
      
      $an14->status = 'draft';
      $an14->status_date = date('Y-m-d');
      $an14->save();
      */


  }

}