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
/*
use App\Models\Ctms\LifeStyle;
use App\Models\Ctms\ClinicalData;
use App\Models\Ctms\SensoryExamination;
use App\Models\Ctms\Mdtre;

use App\Models\Ctms\PfirmannGrade;
use App\Models\Ctms\VAScore;
use App\Models\Ctms\ModqScore;
use App\Models\Ctms\RMQReply;
*/
use App\Models\Ctms\Decisions\Enrollment;
/*
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
*/
use App\Models\Ctms\Clinicals\DrugDetails;


//
use Illuminate\Support\Facades\Log;

trait TDbEntries
{

  public function setDbEntriesPatientModels($uuid, $input)
  {

      $models = [

        \App\Models\Ctms\LifeStyle::class,
        \App\Models\Ctms\ClinicalData::class,
        \App\Models\Ctms\SensoryExamination::class,
        \App\Models\Ctms\Mdtre::class,
        \App\Models\Ctms\PfirmannGrade::class,
        \App\Models\Ctms\VAScore::class,
        \App\Models\Ctms\ModqScore::class,
        \App\Models\Ctms\RMQReply::class,
        \App\Models\Ctms\Clinicals\BloodRoutine::class,
        \App\Models\Ctms\Clinicals\BloodSugar::class,
        \App\Models\Ctms\Clinicals\BloodUrea::class,
        \App\Models\Ctms\Clinicals\ChemicalExam::class,
        \App\Models\Ctms\Clinicals\Creatinine::class,
        \App\Models\Ctms\Clinicals\Crp::class,
        \App\Models\Ctms\Clinicals\Electrolytes::class,
        \App\Models\Ctms\Clinicals\GeneralSummary::class,
        \App\Models\Ctms\Clinicals\Il6::class,
        \App\Models\Ctms\Clinicals\LaboratoryExam::class,
        \App\Models\Ctms\Clinicals\LiverFunction::class,
        \App\Models\Ctms\Clinicals\MicroscopicExam::class,
        \App\Models\Ctms\Clinicals\RenalFunction::class,
        \App\Models\Ctms\Clinicals\UrineRoutine::class,
        \App\Models\Ctms\Clinicals\DrugDetails::class,

      ];


      foreach ($models as $modelClass) {
        $obj = new $modelClass();
        $obj->fill([
            'patient_uuid' => $uuid,
            'opd_id' => $input['opd_id'],
            'in_patient_id' => $input['in_patient_id'],
            'admission_date' => $input['admission_date'],
            'data_type' => $input['data_type'],
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
        $enPat->opd_id = $input['opd_id'];

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

  }

}