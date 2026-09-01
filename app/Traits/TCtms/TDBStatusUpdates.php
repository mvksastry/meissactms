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

trait TDBStatusUpdates
{


  //this should be followed update of timeline of the patient.
  public function setUpdatedPatientDataStatus($uuid, $input)
  {
      //first update the mail patient table here itself.
      //then call the other tables.
      $testObjects = config('ctms.tests');

      $statusUpdate = Patient::where('patient_uuid', $uuid)->first();
      $statusUpdate->status = $input['status'];
      $statusUpdate->status_date = date('Y-m-d');

      //dd($uuid, $input);      
        switch ($input['status']) {

             case 'confirmed':
              $statusUpdate->comment_entered_by=  $input['status_comment'];
              $statusUpdate->entered_by = Auth::user()->name;
              $statusUpdate->entry_date = date('Y-m-d');
            break;       

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
              $statusUpdate->status_code = 160; //determine this value through a login and algorithm
              $statusUpdate->comment_sealed_by=  $input['status_comment'];
              $statusUpdate->sealed_by = Auth::user()->name;
              $statusUpdate->sealed_date = date('Y-m-d');
            break;

            default:
              $input['status'] = 'draft';
        }
        //dd($statusUpdate);

        try {

            $result = $statusUpdate->save();    

            if ($result) 
            { 
                $msg = 'Patient Data Status for [' . $uuid . '] Updated successfully!';
                //now call function to update all tables.

                event(new \App\Events\Ctms\ModelUpdateRequested($uuid, $input['status'], $input['status_comment']));

                //$result = $this->updateEachTestTable($input, $uuid);

            } else {
                $msg = 'Error: Patient Data Status for [' . $uuid . '] could not be Updated';
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database Error While Updating Patient Data Status [' . $uuid . '] While Saving : ' . $e->getMessage();
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error while updating patient Data Status [' . $uuid . '] While Saving : ' . $e->getMessage();
        }

        Log::channel('patient')->info($msg);

        unset($statusUpdate); // destroy reference
      
        return $result;


      // now update all the relevant table, below a huge code was 
      // there but was only first time entry, now let us fill all other columns much like the patients table instead of
      // leaving them blank.
      //IMPORTANT BREAKING CHANGE, IN ALL 23 TABLES, BEYOND ENTERED BY STATUS
      //DONT CHANGE ANYTHING. IT IS NOT NEEDED WE CAN REMOVE THE COLUMNS AS
      //ONLY PATIENT TABLE NEEDS TO UPDATED.
  }

  /*
  private function updateEachTestTable()
  {
      //dd("reached");

      $tests = config('ctms.tests');

      foreach ($tests as $key => $modelClass) {

            $model = $modelClass::find('patient_uuid', $uuid);

            if ($model) {

                    $model->status = $input['status'];
                    $model->status_date = date('Y-m-d');
                    $model->appendComment('comment_entered_by', $input['comment']);

                try {
                      
                    $result = $model->save();
                    if ($result) { 
                        $msg = 'Patient Test Status For [' . $key . '] Updated Successfully!';
                    } else {
                        $msg = 'Error: Patient Test Status For [' . $key . '] Could Not Be updated';
                    }

                } catch (QueryException $e) {
                    // Handles database-related errors (e.g., duplicate email)
                    $msg = 'Database Error While Updating Patient Status [' . $key . '] Message : ' . $e->getMessage();
                } catch (\Exception $e) {
                    // Handles any other general exceptions
                    $msg = 'Unexpected Error While Updating Patient Status [' . $key . '] Message : ' . $e->getMessage();
                }
                Log::channel('patient')->info($msg);
                unset($model); // destroy reference
            } else {
              $msg = 'Test Key [' . $key . '] Not Found';
              Log::channel('patient')->info($msg);
            }
      }
  }
  */

}