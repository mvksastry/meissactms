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

use App\Models\Ctms\Decisions\Enrollment;

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

use App\Models\Ctms\Clinicals\DrugDetails;


//
use Illuminate\Support\Facades\Log;

trait TDbEntriesRevised
{
  public function setAllDbPatientDataModels($uuid, $patObj, $data_type)
  {

        $models = config('ctms.tests');

        foreach ($models as $modelClass) {
            $obj = new $modelClass();
            $obj->fill([
                'patient_uuid' => $uuid,
                'opd_id' => $patObj->opd_id,
                'in_patient_id' => $patObj->in_patient_id,
                'admission_date' => $patObj->admission_date,
                'data_type' => $data_type,
                'status' => 'draft',
                'status_date' => date('Y-m-d'),
        ]);

        //dd($obj);        
        try {
            
            $result = $obj->save(); 

            $tableName = $obj->getTable();  
            
            if ($result) { 
                $msg = 'New Patient Model [' . $tableName . '] saved successfully!';
            } else {
                $msg = 'Error: New Patient Model [' . $tableName . '] could not be saved';
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        }
        Log::channel('patient')->info($msg);
        unset($obj); // destroy reference
      }

      //Make an entry in the enrollment table itself.
        $enPat = new Enrollment();

        $enPat->patient_uuid = $uuid;
        $enPat->opd_id = $patObj->opd_id;

        try {
            
            $resx = $enPat->save();    
            $tableName = $enPat->getTable();  
            if ($resx) { 
                $msg = 'New Patient Model [' . $tableName . '] saved successfully!';
            } else {
                $msg = 'Error: New Patient Model [' . $tableName . '] could not be saved';
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        }
        Log::channel('patient')->info($msg);
        unset($enPat); // destroy reference



      /*
      //dd($uuid, $input);
      //Table #1 make entries in all relevant tables.
      $newLS = new LifeStyle();
      $newLS->patient_uuid = $uuid;
      $newLS->opd_id =  $input['opd_id'];
      $newLS->in_patient_id =  $input['in_patient_id'];
      $newLS->admission_date =  $input['admission_date'];
      $newLS->data_type =  $input['data_type'];
      $newLS->status = 'draft';
      $newLS->status_date = date('Y-m-d');
      $newLS->save();

      //Table #2 make entries in all relevant tables.
      $newCD = new ClinicalData();
      $newCD->patient_uuid = $uuid;
      $newCD->opd_id =  $input['opd_id'];
      $newCD->in_patient_id =  $input['in_patient_id'];
      $newCD->admission_date =  $input['admission_date'];
      $newCD->data_type =  $input['data_type'];
      $newCD->status = 'draft';
      $newCD->status_date = date('Y-m-d');
      $newCD->save();

      //Table #3 make entries in all relevant tables.
      $newSE = new SensoryExamination();
      $newSE->patient_uuid = $uuid;
      $newSE->opd_id =  $input['opd_id'];
      $newSE->in_patient_id =  $input['in_patient_id'];
      $newSE->admission_date =  $input['admission_date'];
      $newSE->data_type =  $input['data_type'];
      $newSE->status = 'draft';
      $newSE->status_date = date('Y-m-d');
      $newSE->save();

      //Table #4 make entries in all relevant tables.
      $newMDT = new Mdtre();
      $newMDT->patient_uuid = $uuid;
      $newMDT->opd_id =  $input['opd_id'];
      $newMDT->in_patient_id =  $input['in_patient_id'];
      $newMDT->admission_date =  $input['admission_date'];
      $newMDT->data_type =  $input['data_type'];
      $newMDT->status = 'draft';
      $newMDT->status_date = date('Y-m-d');
      $newMDT->save();

      //Table #5 make entries in all relevant tables.
      $newPfg = new PfirmannGrade();
      $newPfg->patient_uuid = $uuid;
      $newPfg->opd_id =  $input['opd_id'];
      $newPfg->in_patient_id =  $input['in_patient_id'];
      $newPfg->admission_date =  $input['admission_date'];
      $newPfg->data_type =  $input['data_type'];
      $newPfg->status = 'draft';
      $newPfg->status_date = date('Y-m-d');
      $newPfg->save();

      //Table #6 make entries in all relevant tables.
      $newVasc = new VAScore();
      $newVasc->patient_uuid = $uuid;
      $newVasc->opd_id =  $input['opd_id'];
      $newVasc->in_patient_id =  $input['in_patient_id'];
      $newVasc->admission_date =  $input['admission_date'];
      $newVasc->data_type =  $input['data_type'];
      $newVasc->status = 'draft';
      $newVasc->status_date = date('Y-m-d');
      $newVasc->save();

      //Table #7 make entries in all relevant tables.
      $newModq = new ModqScore();
      $newModq->patient_uuid = $uuid;
      $newModq->opd_id =  $input['opd_id'];
      $newModq->in_patient_id =  $input['in_patient_id'];
      $newModq->admission_date =  $input['admission_date'];
      $newModq->data_type =  $input['data_type'];
      $newModq->status = 'draft';
      $newModq->status_date = date('Y-m-d');
      $newModq->save();

      //Table #8 make entries in all relevant tables.
      $newRMQ = new RMQReply();
      $newRMQ->patient_uuid = $uuid;
      $newRMQ->opd_id =  $input['opd_id'];
      $newRMQ->in_patient_id =  $input['in_patient_id'];
      $newRMQ->admission_date =  $input['admission_date'];
      $newRMQ->data_type =  $input['data_type'];
      $newRMQ->status = 'draft';
      $newRMQ->status_date = date('Y-m-d');
      $newRMQ->save();

      //-- complete rest of the --//

      //Table #9 make entries in all relevant tables.
      $an1 = new BloodRoutine();
      $an1->patient_uuid = $uuid;
      $an1->opd_id =  $input['opd_id'];
      $an1->in_patient_id =  $input['in_patient_id'];
      $an1->admission_date =  $input['admission_date'];
      $an1->data_type =  $input['data_type'];
      $an1->status = 'draft';
      $an1->status_date = date('Y-m-d');
      $an1->save();

      //Table #10 make entries in all relevant tables.
      $an2 = new BloodSugar();
      $an2->patient_uuid = $uuid;
      $an2->opd_id =  $input['opd_id'];
      $an2->in_patient_id =  $input['in_patient_id'];
      $an2->admission_date =  $input['admission_date'];
      $an2->data_type =  $input['data_type'];
      $an2->status = 'draft';
      $an2->status_date = date('Y-m-d');
      $an2->save();

      //Table #11 make entries in all relevant tables.
      $an3 = new BloodUrea();
      $an3->patient_uuid = $uuid;
      $an3->opd_id =  $input['opd_id'];
      $an3->in_patient_id =  $input['in_patient_id'];
      $an3->admission_date =  $input['admission_date'];
      $an3->data_type =  $input['data_type'];
      $an3->status = 'draft';
      $an3->status_date = date('Y-m-d');
      $an3->save();

      //Table #12 make entries in all relevant tables.
      $an4 = new ChemicalExam();
      $an4->patient_uuid = $uuid;
      $an4->opd_id =  $input['opd_id'];
      $an4->in_patient_id =  $input['in_patient_id'];
      $an4->admission_date =  $input['admission_date'];
      $an4->data_type =  $input['data_type'];
      $an4->status = 'draft';
      $an4->status_date = date('Y-m-d');
      $an4->save();

      //Table #13 make entries in all relevant tables.
      $an5 = new Creatinine();
      $an5->patient_uuid = $uuid;
      $an5->opd_id =  $input['opd_id'];
      $an5->in_patient_id =  $input['in_patient_id'];
      $an5->admission_date =  $input['admission_date'];
      $an5->data_type =  $input['data_type'];
      $an5->status = 'draft';
      $an5->status_date = date('Y-m-d');
      $an5->save();

      //Table #14 make entries in all relevant tables.
      $an6 = new Crp();
      $an6->patient_uuid = $uuid;
      $an6->opd_id =  $input['opd_id'];
      $an6->in_patient_id =  $input['in_patient_id'];
      $an6->admission_date =  $input['admission_date'];
      $an6->data_type =  $input['data_type'];
      $an6->status = 'draft';
      $an6->status_date = date('Y-m-d');
      $an6->save();

      //Table #15 make entries in all relevant tables.
      $an7 = new Electrolytes();
      $an7->patient_uuid = $uuid;
      $an7->opd_id =  $input['opd_id'];
      $an7->in_patient_id =  $input['in_patient_id'];
      $an7->admission_date =  $input['admission_date'];
      $an7->data_type =  $input['data_type'];
      $an7->status = 'draft';
      $an7->status_date = date('Y-m-d');
      $an7->save();

      //Table #16 make entries in all relevant tables.
      $an8 = new GeneralSummary();
      $an8->patient_uuid = $uuid;
      $an8->opd_id =  $input['opd_id'];
      $an8->in_patient_id =  $input['in_patient_id'];
      $an8->admission_date =  $input['admission_date'];
      $an8->data_type =  $input['data_type'];
      $an8->status = 'draft';
      $an8->status_date = date('Y-m-d');
      $an8->save();

      //Table #17 make entries in all relevant tables.
      $an9 = new Il6();
      $an9->patient_uuid = $uuid;
      $an9->opd_id =  $input['opd_id'];
      $an9->in_patient_id =  $input['in_patient_id'];
      $an9->admission_date =  $input['admission_date'];
      $an9->data_type =  $input['data_type'];
      $an9->status = 'draft';
      $an9->status_date = date('Y-m-d');
      $an9->save();

      //Table #18 make entries in all relevant tables.
      $an10 = new LaboratoryExam();
      $an10->patient_uuid = $uuid;
      $an10->opd_id =  $input['opd_id'];
      $an10->in_patient_id =  $input['in_patient_id'];
      $an10->admission_date =  $input['admission_date'];
      $an10->data_type =  $input['data_type'];
      $an10->status = 'draft';
      $an10->status_date = date('Y-m-d');
      $an10->save();

      //Table #19 make entries in all relevant tables.
      $an11 = new LiverFunction();
      $an11->patient_uuid = $uuid;
      $an11->opd_id =  $input['opd_id'];
      $an11->in_patient_id =  $input['in_patient_id'];
      $an11->admission_date =  $input['admission_date'];
      $an11->data_type =  $input['data_type'];
      $an11->status = 'draft';
      $an11->status_date = date('Y-m-d');
      $an11->save();

      //Table #20 make entries in all relevant tables.
      $an12 = new MicroscopicExam();
      $an12->patient_uuid = $uuid;
      $an12->opd_id =  $input['opd_id'];
      $an12->in_patient_id =  $input['in_patient_id'];
      $an12->admission_date =  $input['admission_date'];
      $an12->data_type =  $input['data_type'];
      $an12->status = 'draft';
      $an12->status_date = date('Y-m-d');
      $an12->save();

      //Table #21 make entries in all relevant tables.
      $an13 = new RenalFunction();
      $an13->patient_uuid = $uuid;
      $an13->opd_id =  $input['opd_id'];
      $an13->in_patient_id =  $input['in_patient_id'];
      $an13->admission_date =  $input['admission_date'];
      $an13->data_type =  $input['data_type'];
      $an13->status = 'draft';
      $an13->status_date = date('Y-m-d');
      $an13->save();

      //Table #22 make entries in all relevant tables.
      $an14 = new UrineRoutine();
      $an14->patient_uuid = $uuid;
      $an14->opd_id =  $input['opd_id'];
      $an14->in_patient_id =  $input['in_patient_id'];
      $an14->admission_date =  $input['admission_date'];
      $an14->data_type =  $input['data_type'];
      $an14->status = 'draft';
      $an14->status_date = date('Y-m-d');
      $an14->save();

      //Table #23 make entries in all relevant tables.
      $an15 = new DrugDetails();
      $an15->patient_uuid = $uuid;
      $an15->opd_id =  $input['opd_id'];
      $an15->in_patient_id =  $input['in_patient_id'];
      $an15->admission_date =  $input['admission_date'];
      $an15->data_type =  $input['data_type'];
      $an15->status = 'draft';
      $an15->status_date = date('Y-m-d');
      $an15->save();
      */

  }
}